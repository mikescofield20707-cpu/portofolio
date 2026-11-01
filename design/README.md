# Mike Design Archive

Responsive apparel-design portfolio with a grey glass navbar, dark blurred background, vivid purple-to-pink buttons, three-column desktop gallery, search, lightbox, and pagination (30 designs per page).

## Run it
Open `index.html` in a browser, or use VS Code Live Server.

## Add designs
1. Put each image in `assets/designs/`.
2. Open `js/gallery.js` and add an object to the `DESIGNS` array:

```js
{ title: "Midnight Bloom", category: "T-shirt graphic", image: "assets/designs/midnight-bloom.jpg", year: "2026" }
```

Each object is one artwork. The page count updates automatically. Images retain their original aspect ratio (`width: 100%; height: auto`). Desktop uses three columns; mobile uses two.

## Custom background
Place your dark artwork with purple, pink and white accents at `assets/background.jpg`. CSS blurs and dims it; without this image, the gradient fallback still works.

## Customize
Change `mailto:hello@example.com` in `index.html` to your contact address. Font Awesome icons are loaded from CDN, so an internet connection is needed for icons.
