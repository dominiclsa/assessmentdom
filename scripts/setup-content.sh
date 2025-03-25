#!/bin/bash

set -e

echo "🛠 Starting WordPress content setup..."

# Create 5 blog posts
echo "📝 Creating 5 blog posts..."
./bin/wp.sh post generate --post_type=post --count=5 --post_status=publish

# Create 5 pages
echo "📄 Creating 5 pages..."
./bin/wp.sh post generate --post_type=page --count=5 --post_status=publish

# Create 10 movie posts
echo "🎬 Creating 10 movie posts..."
./bin/wp.sh post generate --post_type=movie --count=10 --post_status=publish

# Create genres
echo "🏷 Creating genre terms..."
./bin/wp.sh term create genre Action || true
./bin/wp.sh term create genre Comedy || true
./bin/wp.sh term create genre Drama || true
./bin/wp.sh term create genre "Sci-Fi" || true

# Get IDs of the 10 latest movie posts
movie_ids=$(./bin/wp.sh post list --post_type=movie --format=ids --orderby=ID --order=desc | tr " " "\n" | head -n 10)

echo "🔗 Assigning genres to movie posts..."
genres=(Action Drama Comedy "Sci-Fi" Action Comedy Drama "Sci-Fi" Action Comedy)

i=0
for id in $movie_ids; do
    genre="${genres[$i]}"
    echo "🎯 Setting '$genre' for movie ID $id"
    ./bin/wp.sh post term set "$id" genre "$genre" || true
    ((i++))
done

echo "✅ WordPress content setup complete!"


./bin/wp.sh rewrite structure '/%postname%/' --hard
./bin/wp.sh eval 'flush_rewrite_rules();'