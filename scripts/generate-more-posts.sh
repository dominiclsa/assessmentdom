#!/bin/bash

set -e

echo "🎬 Generating 25 more movie posts with random genres..."

# Step 1: Generate 25 movie posts
./bin/wp.sh post generate --post_type=movie --count=25 --post_status=publish

# Step 2: Define the genre list
genres=(Action Drama Comedy "Sci-Fi" Action Comedy Drama "Sci-Fi" Action Comedy)

# Step 3: Get the latest 50 movie IDs
movie_ids=$(./bin/wp.sh post list --post_type=movie --orderby=ID --order=desc --format=ids | tr " " "\n" | head -n 25)

# Step 4: Assign a random genre to each movie post
echo "🏷 Assigning genres..."
for id in $movie_ids; do
  random_genre="${genres[$RANDOM % ${#genres[@]}]}"
  echo "🎯 Assigning genre '$random_genre' to movie ID $id"
  ./bin/wp.sh post term set "$id" genre "$random_genre" || true
done

echo "✅ Done! 25 movie posts created and assigned genres."
