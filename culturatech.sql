-- Tabel untuk pengguna (user)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk kategori produk (kategori dari barang yang dijual)
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Tabel untuk produk (barang yang dijual)
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(20, 2) NOT NULL,
    stock INT DEFAULT 0,
    image_url VARCHAR(255),
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);


-- Tabel untuk keranjang belanja (cart)
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- ID unik untuk setiap entri keranjang
    user_id INT NOT NULL,                  -- Wajib terhubung ke pengguna yang login
    product_id INT NOT NULL,               -- Produk wajib dipilih
    quantity INT DEFAULT 1,                -- Default jumlah adalah 1
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Waktu penambahan otomatis
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,  -- Hapus entri jika pengguna dihapus
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE -- Hapus entri jika produk dihapus
);


-- Tabel untuk transaksi atau pesanan (orders)
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_price DECIMAL(20, 2) NOT NULL,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel untuk detail pesanan
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);


INSERT INTO categories (nama, image_url) VALUES 
('Pakaian', 'pakaian.png'),
('Kerajinan Tangan', 'kura.png'),
('Makanan Khas', 'Bakpia-logo.png');


INSERT INTO products (name, description, price, stock, image_url, category_id, created_at) VALUES
('Batik', 'Batik elegan dengan motif khas Indonesia yang cocok digunakan untuk berbagai acara formal maupun semi-formal. Dibuat dari bahan berkualitas tinggi untuk kenyamanan maksimal.', 250000, 10, 'batik1.jpg', 1, NOW()),
('Miniatur Wayang', 'Miniatur wayang yang menggambarkan seni dan budaya Indonesia. Kerajinan tangan ini sangat cocok sebagai hiasan rumah atau hadiah untuk koleksi.', 80000, 15, 'kerajinan1.png', 2, NOW()),
('Batik Perempuan', 'Batik cantik dengan desain modern yang dirancang khusus untuk perempuan. Cocok untuk dikenakan saat acara formal, pesta, atau kegiatan sehari-hari.', 300000, 8, 'batik2.jpg', 1, NOW()),
('Topeng', 'Topeng tradisional buatan tangan yang mencerminkan seni budaya Nusantara. Sangat ideal untuk dekorasi rumah, panggung seni, atau hadiah unik.', 50000, 20, 'kerajinan2.jpg', 2, NOW()),
('Dress Batik', 'Dress batik modern dengan desain elegan dan warna yang menarik. Pilihan sempurna untuk menghadiri acara formal, pertemuan keluarga, atau pesta.', 400000, 5, 'batik3.jpg', 1, NOW()),
('Patung Rama Shinta', 'Patung Rama Shinta dengan detail ukiran yang sangat indah, mencerminkan kisah cinta legendaris dalam budaya Indonesia. Cocok untuk dekorasi ruangan.', 200000, 10, 'kerajinan3.jpg', 2, NOW()),
('Asbak Kayu', 'Asbak kayu tradisional yang dibuat dengan teknik ukiran tangan. Produk ini sangat fungsional dan menambah nuansa alami pada dekorasi rumah Anda.', 50000, 30, 'kerajinan4.jpg', 2, NOW()),
('Rok Batik', 'Rok batik stylish yang dirancang untuk memberikan kenyamanan dan tampilan elegan. Cocok untuk kegiatan sehari-hari maupun acara formal.', 315000, 10, 'batik4.jpg', 1, NOW()),
('Batik Lurik', 'Kain batik lurik klasik dengan motif sederhana yang penuh makna. Ideal untuk dijadikan pakaian tradisional atau modern.', 200000, 15, 'lurik1.jpg', 1, NOW()),
('Pie Jogja', 'Pie khas Jogja yang lembut dan renyah dengan rasa manis yang khas. Cocok sebagai oleh-oleh atau camilan keluarga.', 45000, 25, 'makanan1.jpg', 3, NOW()),
('Kebaya Jogja', 'Kebaya khas Jogja dengan detail bordir yang halus. Dibuat dengan bahan berkualitas tinggi untuk memberikan kenyamanan dan tampilan anggun.', 230000, 8, 'kebaya1.jpg', 1, NOW()),
('Bakpia 25', 'Bakpia 25, jajanan khas Jogja dengan tekstur lembut dan rasa manis yang menggugah selera. Pilihan terbaik untuk oleh-oleh.', 35000, 40, 'makanan2.jpg', 3, NOW()),
('Bakpia Kukus', 'Bakpia kukus dengan tekstur lembut dan rasa autentik khas Jogja. Cocok sebagai camilan di rumah atau oleh-oleh untuk keluarga dan teman.', 50000, 30, 'makanan3.jpg', 3, NOW()),
('Kebaya Kutu Baru', 'Kebaya kutu baru klasik yang dipadukan dengan desain modern. Sangat cocok untuk menghadiri acara formal dengan tampilan elegan.', 300000, 7, 'kebaya2.jpg', 1, NOW()),
('Wingko Babat', 'Wingko Babat dengan rasa tradisional yang manis dan gurih. Cocok sebagai camilan di sore hari bersama keluarga.', 35000, 20, 'makanan4.jpg', 3, NOW()),
('Lurik Perempuan', 'Kain lurik cantik yang dirancang khusus untuk perempuan. Memberikan tampilan anggun dengan sentuhan tradisional yang khas.', 350000, 5, 'kebaya3.jpg', 1, NOW());
