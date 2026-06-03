import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { formatTemplateFile, getTemplateFiles } from './template-format-utils.mjs';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const projectRoot = path.resolve(__dirname, '..');
const templatesRoot = path.resolve(projectRoot, 'src/Views/templates');

const templateFiles = await getTemplateFiles(templatesRoot);
let changedFiles = 0;

for (const filePath of templateFiles) {
    const didChange = await formatTemplateFile(filePath);

    if (didChange) {
        changedFiles += 1;
        console.log(`FORMATTED ${path.relative(projectRoot, filePath)}`);
    }
}

if (changedFiles === 0) {
    console.log('All template files are already formatted.');
}
