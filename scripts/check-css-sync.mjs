import { readFile } from 'node:fs/promises';
import fs from 'node:fs';
import path from 'node:path';
import process from 'node:process';
import { fileURLToPath } from 'node:url';
import { cssAssets } from './assets.config.mjs';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const projectRoot = path.resolve(__dirname, '..');

const { transform } = await import('lightningcss').catch(() => {
    throw new Error('Missing `lightningcss`. Run `npm install` before checking CSS assets.');
});

function resolveProjectPath(relativePath) {
    return path.resolve(projectRoot, relativePath);
}

let hasDiff = false;

for (const [sourceRelativePath, outputRelativePath] of cssAssets) {
    const sourcePath = resolveProjectPath(sourceRelativePath);
    const outputPath = resolveProjectPath(outputRelativePath);
    const sourceCode = await readFile(sourcePath);
    const expected = transform({
        filename: sourcePath,
        code: sourceCode,
        minify: true,
        drafts: {
            nesting: true,
        },
    }).code;

    if (!fs.existsSync(outputPath)) {
        hasDiff = true;
        console.log(`MISS ${sourceRelativePath} -> ${outputRelativePath}`);
        continue;
    }

    const actual = await readFile(outputPath);
    const isMatch = Buffer.compare(Buffer.from(expected), Buffer.from(actual)) === 0;

    console.log(`${isMatch ? 'OK  ' : 'DIFF'} ${sourceRelativePath} -> ${outputRelativePath}`);

    if (!isMatch) {
        hasDiff = true;
    }
}

if (hasDiff) {
    console.error('CSS assets are out of sync. Run `npm run build:assets`.');
    process.exitCode = 1;
}
