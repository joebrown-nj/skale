import { readdir, readFile, writeFile } from 'node:fs/promises';
import path from 'node:path';

const voidTags = new Set([
    'area',
    'base',
    'br',
    'col',
    'embed',
    'hr',
    'img',
    'input',
    'link',
    'meta',
    'param',
    'source',
    'track',
    'wbr',
]);

const indentUnit = '    ';
const smartyOpenPattern = /^\{(if|foreach|for|section|capture|block|literal|strip|while)\b[^}]*\}$/;
const smartyClosePattern = /^\{\/[^}]+\}$/;
const smartyElsePattern = /^\{(else|foreachelse)\b[^}]*\}$/;

function getSmartyTokens(trimmedLine) {
    if (smartyElsePattern.test(trimmedLine)) {
        return ['close', 'open'];
    }

    if (smartyClosePattern.test(trimmedLine)) {
        return ['close'];
    }

    if (smartyOpenPattern.test(trimmedLine)) {
        return ['open'];
    }

    return [];
}

function getHtmlTokens(line) {
    const tokens = [];
    const tagPattern = /<\/?([A-Za-z][\w:-]*)\b[^>]*?>/g;

    for (const match of line.matchAll(tagPattern)) {
        const [fullMatch, tagName] = match;
        const normalizedTagName = tagName.toLowerCase();

        if (fullMatch.startsWith('</')) {
            tokens.push('close');
            continue;
        }

        if (voidTags.has(normalizedTagName) || /\/\s*>$/.test(fullMatch)) {
            continue;
        }

        tokens.push('open');
    }

    return tokens;
}

function getLineTokens(trimmedLine) {
    if (!trimmedLine || trimmedLine.startsWith('{*') || trimmedLine.startsWith('*}') || trimmedLine.startsWith('<!--') || trimmedLine.endsWith('-->')) {
        return [];
    }

    if (trimmedLine.startsWith('{') && trimmedLine.endsWith('}') && !trimmedLine.includes('<')) {
        return getSmartyTokens(trimmedLine);
    }

    return getHtmlTokens(trimmedLine);
}

function getIndentAdjustment(tokens) {
    let balance = 0;
    let minimumBalance = 0;

    for (const token of tokens) {
        balance += token === 'open' ? 1 : -1;
        minimumBalance = Math.min(minimumBalance, balance);
    }

    return {
        delta: balance,
        leadingDedent: Math.abs(Math.min(0, minimumBalance)),
    };
}

export function formatTemplateContent(content) {
    const normalizedContent = content.replace(/\r\n/g, '\n');
    const lines = normalizedContent.split('\n');

    if (lines.at(-1) === '') {
        lines.pop();
    }

    const formattedLines = [];
    let indentLevel = 0;
    let inSmartyComment = false;

    for (const line of lines) {
        const trimmedLine = line.trim();

        if (!trimmedLine) {
            formattedLines.push('');
            continue;
        }

        if (inSmartyComment) {
            formattedLines.push(`${indentUnit.repeat(indentLevel)}${trimmedLine}`);

            if (trimmedLine.includes('*}')) {
                inSmartyComment = false;
            }

            continue;
        }

        if (trimmedLine.startsWith('{*') && !trimmedLine.includes('*}')) {
            formattedLines.push(`${indentUnit.repeat(indentLevel)}${trimmedLine}`);
            inSmartyComment = true;
            continue;
        }

        const tokens = getLineTokens(trimmedLine);
        const { delta, leadingDedent } = getIndentAdjustment(tokens);
        const lineIndentLevel = Math.max(0, indentLevel - leadingDedent);

        formattedLines.push(`${indentUnit.repeat(lineIndentLevel)}${trimmedLine}`);
        indentLevel = Math.max(0, indentLevel + delta);
    }

    return `${formattedLines.join('\n')}\n`;
}

export async function getTemplateFiles(rootDirectory) {
    const entries = await readdir(rootDirectory, { withFileTypes: true });
    const files = [];

    for (const entry of entries) {
        const fullPath = path.join(rootDirectory, entry.name);

        if (entry.isDirectory()) {
            files.push(...await getTemplateFiles(fullPath));
            continue;
        }

        if (entry.isFile() && fullPath.endsWith('.tpl')) {
            files.push(fullPath);
        }
    }

    return files.sort();
}

export async function formatTemplateFile(filePath) {
    const originalContent = await readFile(filePath, 'utf8');
    const formattedContent = formatTemplateContent(originalContent);

    if (formattedContent === originalContent) {
        return false;
    }

    await writeFile(filePath, formattedContent);
    return true;
}

export async function isTemplateFileFormatted(filePath) {
    const originalContent = await readFile(filePath, 'utf8');
    return formatTemplateContent(originalContent) === originalContent;
}
