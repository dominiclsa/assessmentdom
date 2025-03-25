# 📦 WordPress Assessment Theme

A custom-built WordPress theme for the **WordPress Developer Assessment**, featuring a fully responsive movie catalog using a custom post type (`Movie`) and taxonomy (`Genre`). Includes REST API integration, infinite scroll, related movies, and automated content generation.

---

## 🚀 Features Implemented

### ✅ Core Functionality

- [x] 5 sample blog posts and 5 pages generated via WP-CLI
- [x] Custom post type: `Movie`
- [x] Custom taxonomy: `Genre` (used only for Movies)
- [x] Homepage that dynamically loads Movie posts (initial load fills screen)
- [x] `single-movie.php` template (with title, genre, featured image, and full content)
- [x] Related Movies section (based on Genre)
- [x] `single.php` for blog posts (author, image, content)
- [x] `page.php` for static pages
- [x] `archive-movie.php` with pagination (10 per page)
- [x] Random featured images via [Picsum](https://picsum.photos)

### 💎 Bonus Features

- [x] Infinite scroll (via JS + WP REST API)
- [x] Responsive grid layout for movies
- [x] Random thumbnail for each movie card
- [x] Styled related movie thumbnails
- [x] Fully automated content setup via script

---

## 🛠 Requirements

To run this theme locally, you'll need:

- Node.js ~18
- npm ~8
- Docker
- WP-CLI (via `@wordpress/env`)

---

## ⚙️ Getting Started

### 1. Clone this repo

```bash
git clone https://github.com/dominiclsa/assessmentdom
cd wordpress-assessment
```

2. Install dependencies
   npm install

3. Start the WordPress environment
   npm run env:init
   npm run env:launch

Visit your local site at:
➡️ http://localhost:8888

Admin Login:
Username: admin
Password: password 

4. Set Permalinks

Set permalink structure to /%postname%/ manually:
http://localhost:8888/wp-admin/options-permalink.php

⚠️ Note: I was unable to automate this step by wp-cli, it seems to be something related to docker/apache config.


![save](https://github.com/user-attachments/assets/3c769dfc-4394-415f-a8d6-88bba17fbbe4)


🧪 Content Setup Script
To auto-generate demo content (posts, pages, movies, genres), run:

npm run setup:content

This will:
Create 5 blog posts
Create 5 pages
Create 10 movie posts
Create 4 genre terms
Randomly assign genres to movies

If need more content, run:

npm run setup:morecontent

🌐 Routes

Homepage
➡️ http://localhost:8888
Loads movies to fill the screen and triggers infinite scroll as you scroll down.

Movie Archive
➡️ http://localhost:8888/movie
Shows all movies with traditional pagination (10 per page)

Single Movie Page
➡️ http://localhost:8888/movie/post-1
Displays full movie content with 3 related movies
