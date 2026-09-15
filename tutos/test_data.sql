USE blog_db;

-- 1. Insert 3 Categories
INSERT INTO category (id, name) VALUES
(1, 'Italian Cuisine'),
(2, 'Quick & Easy'),
(3, 'Desserts & Baking');

-- 2. Insert 2 Users (using 'author' status per your ENUM)
INSERT INTO users (id, username, status) VALUES
(1, 'Chef_Marco', 'author'),
(2, 'SarahBakes', 'author');

-- 3. Insert 2 Images (using 'image_url')
INSERT INTO images (id, image_url) VALUES
(1, 'https://images.unsplash.com/photo-1551183053-bf91a1d81141'),
(2, 'https://images.unsplash.com/photo-1509440159596-0249088772ff');

-- 4. Insert 2 Articles (linked via foreign keys user_id, category_id, image_id)
INSERT INTO articles (id, user_id, title, content, category_id, image_id) VALUES
(
  1,
  1, -- Chef_Marco
  'The Secret to Authentic Roman Carbonara',
  'Forget cream and peas—authentic Roman carbonara relies on just four main ingredients: guanciale, pecorino romano, egg yolks, and black pepper. The trick is using reserved hot pasta water to emulsify the cheese and eggs into a silky sauce without scrambling them.',
  1, -- Italian Cuisine
  1  -- Carbonara image
),
(
  2,
  2, -- SarahBakes
  'Beginner Guide to Baking Sourdough at Home',
  'Baking sourdough for the first time can feel intimidating, but it all comes down to patience and hydration. In this guide, we break down how to maintain your starter, stretch and fold your dough, and get that perfect crispy crust using a Dutch oven.',
  3, -- Desserts & Baking
  2  -- Sourdough image
);