// This script would normally be in a separate file
// It handles loading product data based on URL parameters
        
// Product data for all items
const products = {
    'fabric': {
        name: 'Sky Blue Solid Polyester Satin',
        price: '₱ 40.00 /yrd',
        image: './media/img/fabric.jpg',
        description: 'Elevate your sewing projects with the Sky Blue Solid Polyester Satin – a smooth, lustrous fabric that combines elegance with versatility. With its soft sheen and silky touch, this satin is perfect for creating everything from elegant garments to decorative crafts and accessories.',
        benefits: [
            'Smooth & Easy to Sew: Glides easily under the machine, great for both beginners and experienced sewers.',
            'Vibrant Color: The rich sky blue hue adds a calming, polished look to any project.',
            'Wrinkle-Resistant & Durable: Maintains its shape and shine after washes, perfect for long-lasting creations.',
            'Versatile Use: Suitable for clothing, crafts, décor, event styling, and cosplay.',
            'Cost-Effective Elegance: Get the look of luxury at an affordable price.'
        ]
    },
    'plate': {
        name: 'Cabana Striped Dinner Plates',
        price: '₱ 135.00',
        image: './media/img/plate.png',
        description: 'Crafted from durable, food-safe ceramic or porcelain, each plate is designed to be both microwave and dishwasher safe, making cleanup easy and dining hassle-free. The wide surface offers plenty of space for your favorite dishes, whether it\'s a colorful summer salad or a hearty home-cooked dinner.',
        benefits: [
            'Easy to Clean: Dishwasher-safe material makes post-meal cleanup effortless.',
            'Microwave-Safe: Perfect for reheating leftovers or keeping food warm.',
            'Durable & Practical: Built for daily use without compromising on style.',
            'Versatile Design: Suitable for everyday meals, brunches, or entertaining guests with a chic coastal vibe.'
        ]
    },
    'wall-poster': {
        name: 'Summer Beach Collage Matte Print',
        price: '₱ 89.00',
        image: './media/img/wall poster.png',
        description: 'Printed on high-quality matte paper, the artwork delivers a smooth, glare-free finish that looks stunning in any light. Whether you\'re decorating a bedroom, studio, or creative space, this wall print instantly adds a soft, breezy aesthetic that refreshes your surroundings and lifts your mood.',
        benefits: [
            'Aesthetic Appeal: The soft summer tones and curated imagery create a relaxing visual focal point.',
            'Mood-Enhancing: Inspires calm, creativity, and positive vibes—perfect for spaces where you want to unwind or feel inspired.',
            'Matte Finish: No glare, no reflections—just clean, crisp visuals that stay vivid over time.',
            'Ready to Frame: Available in standard sizes for easy framing and hanging.'
        ]
    },
    'gel-pen': {
        name: 'Stationery Blue Gel Pen (4 pcs)',
        price: '₱ 116.00',
        image: './media/img/pen.png',
        description: 'Each pen features a fine-tip point for precision writing and a comfortable grip that makes long writing sessions effortless. The quick-drying gel ink flows smoothly without skips or smudges, making your writing look clean and crisp every time.',
        benefits: [
            'Smooth Writing: Gel ink glides effortlessly across the page with rich, consistent color.',
            'Perfect for Study or Work: Ideal for highlighting important notes, underlining ideas, or writing with clarity and style.',
            'No Smudges or Skips: Fast-drying formula prevents ink smears—great for left-handed writers too.',
            'Portable & Stylish: Sleek design fits easily into pencil cases, planners, or pockets.',
            'Set of 4: Keeps you stocked at home, school, or the office.'
        ]
    },
    'ruler': {
        name: 'Three-Sided Ruler (3 pcs)',
        price: '₱ 94.00',
        image: './media/img/three sided ruler.png',
        description: 'Made from durable, lightweight plastic or aluminum, these rulers are built to last and stay accurate over time. Whether you\'re drafting blueprints, sketching designs, or solving math problems, this set helps you measure, draw, and align with total confidence.',
        benefits: [
            'Multi-Angle Design: Each ruler features three sides with various scale markings—ideal for technical drawings, geometric designs, or classroom use.',
            'Durable & Lightweight: Built to withstand daily use without bending or breaking.',
            'Perfect for Learning & Work: Great for students, professionals, or hobbyists needing reliable precision.',
            'Time-Saving Tool: Quickly switch between measurements without needing multiple tools.'
        ]
    },
    'umbrella': {
        name: 'Transparent Sakura Umbrella',
        price: '₱ 203.00',
        image: './media/img/umbrella 2.webp',
        description: 'Step into elegance and serenity with the Blue Shade Sakura Umbrella, a perfect blend of beauty and function. Inspired by the delicate bloom of cherry blossoms under a tranquil sky, this umbrella features a graceful sakura design set against calming shades of sky blue and deep indigo—bringing a touch of Japanese charm to your everyday essentials.',
        benefits: [
            'UV Protection: Blocks harmful UV rays, making it perfect for sunny days.',
            'Waterproof & Windproof: High-quality canopy keeps you dry, while the sturdy frame resists flipping in strong gusts.',
            'Compact & Lightweight: Folds easily into your bag, ideal for travel or everyday carry.',
            'Aesthetic Design: The soft sakura patterns evoke peace and grace, making it a stylish statement piece.'
        ]
    },
    'highlighter': {
        name: 'Shade Blue Highlighter (8 pcs)',
        price: '₱ 158.00',
        image: './media/img/markers.png',
        description: 'Highlight with style and clarity using the Shade Blue Highlighter Set, a pack of 8 beautifully toned blue highlighters designed to make your notes stand out—without overwhelming the page. With soft to deep blue shades, this set offers a cool, cohesive aesthetic perfect for planners, study notes, journals, and creative projects.',
        benefits: [
            '8 Unique Shades of Blue: Great for organizing notes by tone or simply adding a clean, calming vibe to your work.',
            'Dual-Use Tip: Highlight thick lines or underline with precision—all in one tool.',
            'Perfect for Studying & Journaling: Keep your pages neat, readable, and visually engaging.',
            'No Bleed, No Mess: Quick-dry ink keeps your work smudge-free and crisp.',
            'Aesthetic Stationery Must-Have: Ideal for students, artists, and stationery lovers alike.'
        ]
    },
    'acrylic-shelf': {
        name: 'Acrylic Pen Shelf Three Slots',
        price: '₱ 139.00',
        image: './media/img/acrylic shelf.png',
        description: 'Keep your workspace clean, stylish, and organized with the Acrylic Pen Shelf – Three Slots, a sleek and minimal display stand designed to showcase your favorite pens, markers, or tools with elegance and ease. Crafted from high-quality clear acrylic, this shelf blends seamlessly with any desk setup or aesthetic space.',
        benefits: [
            'Organized & Accessible: Keeps your most-used tools visible and within easy reach.',
            'Clutter-Free Desk: Reduces mess while adding a clean, polished look to your workspace.',
            'Transparent Design: The clear acrylic complements any color scheme or aesthetic style.',
            'Durable & Easy to Clean: Made from sturdy, scratch-resistant acrylic that\'s easy to wipe down.',
            'Multipurpose Use: Great for students, artists, writers, or anyone who loves a neat and creative space.'
        ]
    }
};

// Get product ID from URL
const urlParams = new URLSearchParams(window.location.search);
const productId = urlParams.get('id');

// Load product data
if (productId && products[productId]) {
    const product = products[productId];
    document.getElementById('product-name').textContent = product.name;
    document.getElementById('product-price').textContent = product.price;
    document.getElementById('product-img').src = product.image;
    document.getElementById('product-img').alt = product.name;
    document.getElementById('product-description').textContent = product.description;
    
    const benefitsList = document.getElementById('product-benefits');
    benefitsList.innerHTML = '';
    product.benefits.forEach(benefit => {
        const li = document.createElement('li');
        li.textContent = benefit;
        benefitsList.appendChild(li);
    });
} else {
    // Redirect or show error if product not found
    window.location.href = 'index.html';
}