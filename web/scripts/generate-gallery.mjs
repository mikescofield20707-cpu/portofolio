// Run from the website root: node scripts/generate-gallery.mjs
// Scans assets/gallery and creates assets/gallery/gallery-images.json.
// Supported formats: jpg, jpeg, png, webp, gif, avif.
import { readdir, writeFile, mkdir } from "node:fs/promises";
import path from "node:path";

const folder = path.resolve("assets/gallery");
const output = path.join(folder, "gallery-images.json");
const extensions = new Set([".jpg", ".jpeg", ".png", ".webp", ".gif", ".avif"]);

await mkdir(folder, { recursive: true });
const files = await readdir(folder, { withFileTypes: true });

const photos = files
  .filter((file) => file.isFile() && extensions.has(path.extname(file.name).toLowerCase()))
  .sort((a, b) => a.name.localeCompare(b.name, undefined, { numeric: true, sensitivity: "base" }))
  .map((file) => {
    const name = path.parse(file.name).name;
    return {
      src: `assets/gallery/${encodeURIComponent(file.name)}`,
      alt: name.replace(/[-_]+/g, " "),
      caption: name.replace(/[-_]+/g, " ")
    };
  });

await writeFile(output, JSON.stringify({ photos }, null, 2) + "\n", "utf8");
console.log(`Gallery manifest created: ${photos.length} photo(s) -> ${output}`);
