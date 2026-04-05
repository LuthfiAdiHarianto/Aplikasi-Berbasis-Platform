const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const app = express();
const PORT = 3000;

app.use(bodyParser.json());
app.use(express.static('public'));

// Data Dummy (Simulasi Database)
let items = [
    { id: 1, nama: "Laptop", kategori: "Elektronik", stok: 10 },
    { id: 2, nama: "Meja Kantor", kategori: "Furniture", stok: 5 }
];

// API: Get All Data (JSON format untuk Datatables)
app.get('/api/items', (req, res) => {
    res.json({ data: items });
});

// API: Create
app.post('/api/items', (req, res) => {
    const newItem = { id: Date.now(), ...req.body };
    items.push(newItem);
    res.json({ message: "Data berhasil ditambah!" });
});

// API: Update
app.put('/api/items/:id', (req, res) => {
    const id = parseInt(req.params.id);
    items = items.map(item => item.id === id ? { ...item, ...req.body } : item);
    res.json({ message: "Data berhasil diupdate!" });
});

// API: Delete
app.delete('/api/items/:id', (req, res) => {
    const id = parseInt(req.params.id);
    items = items.filter(item => item.id !== id);
    res.json({ message: "Data berhasil dihapus!" });
});

app.listen(PORT, () => {
    console.log(`Server berjalan di http://localhost:${PORT}`);
});