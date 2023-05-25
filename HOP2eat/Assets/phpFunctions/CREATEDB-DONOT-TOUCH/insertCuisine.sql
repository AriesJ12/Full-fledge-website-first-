INSERT INTO cuisine_classification
(name)
VALUES
('breakfast'),
('lunch'),
('dinner');

INSERT INTO restaurant_cuisine (restaurantID, ClassificationID, name, imageURL) VALUES
(1, 1, "Egg Benedicts", "Benedicts.png"),
(2, 1, "The Breakfast Wrap", "b- wrap.png"),
(3, 1, "Avocado Toast", "avocado.png"),
(4, 1, "Spicy Honey Fried Chicken Sandwich", "Chicken-Sandwich.jpg"),
(5, 1, "Fresh Strawberry Nutella Tostada", "strawberry.png"),
(6, 1, "Grilled Three Cheese And Ham", "ham&cheese.png"),
(7, 1, "Herb Roasted Chicken", "herb.png"),
(8, 1, "Carrot-Pumpkin Soup", "Carrot-Soup.jpg"),

(9, 2, "Creamy Beef Salpicado"," beef.jpg"),
(10, 2, "Honey Garlic B.F. Chicken", "honey.jpg"),
(11, 2, "Spicy Chicken Salpicao", "spicy.jpg"),
(12, 2, "Beef Pot Roast Ranchero", "pot.jpg"),
(13, 2, "Cajun Rib-eye Steak", "steak.jpg"),
(14, 2, "Shrimp Scampi", "shrimp.png"),
(15, 2, "Chicken Fettuccine Alfredo", "pasta.png"),
(16, 2, "Grilled Octopus", "Grilled-Octopus.jpg"),

(17, 3, "Rib Eye Steak", "Rib-Eye-Steak.jpg"),
(18, 3, "Crock Pot Beef and Noodles", "noodles.jpg"),
(19, 3, "Buffalo Cream Cheese Wings", "wings.jpg"),
(20, 3, "Crock Pot Beef and Noodles", "noodles.jpg"),
(21, 3, "Skill Thighset Teriyaki Chicken", "teriyaki.jpg"),
(22, 3, "Beef Pot Roast Ranchero", "salmon.jpg"),
(23, 3, "Unstuffed Cabbage Roll Soup", "soup.jpg"),
(24, 3, "Mandarin Chicken", "mandarin.jpeg");
