import { mkdir, readFile, writeFile } from 'node:fs/promises';
import path from 'node:path';
import process from 'node:process';
import { fileURLToPath } from 'node:url';
import { cssAssets, cssSourceRoot, jsAssets } from './assets.config.mjs';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const projectRoot = path.resolve(__dirname, '..');

const isWatchMode = process.argv.includes('--watch');

const [{ build: esbuild, context: createEsbuildContext }, { transform: transformCss }, watcher] = await Promise.all([
    import('esbuild').catch(() => {
        throw new Error('Missing `esbuild`. Run `npm install` before building assets.');
    }),
    import('lightningcss').catch(() => {
        throw new Error('Missing `lightningcss`. Run `npm install` before building assets.');
    }),
    import('@parcel/watcher').catch(() => {
        throw new Error('Missing `@parcel/watcher`. Run `npm install` before using watch mode.');
    }),
]);

function resolveProjectPath(relativePath) {
    return path.resolve(projectRoot, relativePath);
}

async function ensureParentDirectory(filePath) {
    await mkdir(path.dirname(filePath), { recursive: true });
}

async function buildCssAsset([sourceRelativePath, outputRelativePath]) {
    const sourcePath = resolveProjectPath(sourceRelativePath);
    const outputPath = resolveProjectPath(outputRelativePath);
    const code = await readFile(sourcePath);
    const result = transformCss({
        filename: sourcePath,
        code,
        minify: true,
        drafts: {
            nesting: true,
        },
    });

    await ensureParentDirectory(outputPath);
    await writeFile(outputPath, result.code);
    console.log(`CSS  ${sourceRelativePath} -> ${outputRelativePath}`);
}

async function buildAllCss() {
    for (const asset of cssAssets) {
        await buildCssAsset(asset);
    }
}

async function buildJsAsset([sourceRelativePath, outputRelativePath]) {
    await esbuild({
        entryPoints: [resolveProjectPath(sourceRelativePath)],
        outfile: resolveProjectPath(outputRelativePath),
        bundle: false,
        minify: true,
        legalComments: 'none',
        target: ['es2019'],
    });

    console.log(`JS   ${sourceRelativePath} -> ${outputRelativePath}`);
}

async function buildAllJs() {
    for (const asset of jsAssets) {
        await buildJsAsset(asset);
    }
}

async function buildAllAssets() {
    await Promise.all([
        buildAllCss(),
        buildAllJs(),
    ]);
}

async function watchCssAssets() {
    let cssBuildTimeout = null;

    const scheduleCssBuild = () => {
        if (cssBuildTimeout) {
            clearTimeout(cssBuildTimeout);
        }

        cssBuildTimeout = setTimeout(async () => {
            try {
                await buildAllCss();
            } catch (error) {
                console.error('CSS build failed:', error);
            }
        }, 50);
    };

    return watcher.subscribe(resolveProjectPath(cssSourceRoot), (error, events) => {
        if (error) {
            console.error('CSS watcher error:', error);
            return;
        }

        const shouldRebuild = events.some((event) => event.path.endsWith('.css') && !event.path.endsWith('.min.css'));

        if (shouldRebuild) {
            scheduleCssBuild();
        }
    });
}

async function watchJsAssets() {
    const contexts = [];

    for (const asset of jsAssets) {
        const [sourceRelativePath, outputRelativePath] = asset;
        const ctx = await createEsbuildContext({
            entryPoints: [resolveProjectPath(sourceRelativePath)],
            outfile: resolveProjectPath(outputRelativePath),
            bundle: false,
            minify: true,
            legalComments: 'none',
            target: ['es2019'],
        });

        await ctx.watch();
        contexts.push(ctx);
    }

    return contexts;
}

async function main() {
    await buildAllAssets();

    if (!isWatchMode) {
        return;
    }

    console.log('Watching assets...');
    await watchJsAssets();
    await watchCssAssets();
}

main().catch((error) => {
    console.error(error);
    process.exitCode = 1;
});
