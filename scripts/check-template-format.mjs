import path from 'node:path';
import process from 'node:process';
import { fileURLToPath } from 'node:url';
import { getTemplateFiles, isTemplateFileFormatted } from './template-format-utils.mjs';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const projectRoot = path.resolve(__dirname, '..');
const templatesRoot = path.resolve(projectRoot, 'src/Views/templates');

const templateFiles = await getTemplateFiles(templatesRoot);
const unformattedFiles = [];

for (const filePath of templateFiles) {
    const isFormatted = await isTemplateFileFormatted(filePath);

    if (!isFormatted) {
        unformattedFiles.push(path.relative(projectRoot, filePath));
    }
}

if (unformattedFiles.length === 0) {
    console.log('All template files are properly formatted.');
    process.exit(0);
}

for (const filePath of unformattedFiles) {
    console.log(`UNFORMATTED ${filePath}`);
}

console.error('Template files are out of format. Run `npm run format:tpl`.');
process.exit(1);
