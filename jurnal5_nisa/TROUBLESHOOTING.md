# 🔧 Troubleshooting: Error 401 Unauthorized

## Masalah
Anda mendapat error **401 Unauthorized** dengan response:
```json
{
    "message": "Unauthenticated."
}
```

## Penyebab
Token tidak terkirim dengan benar ke server. Dari screenshot, saya lihat Anda sudah di tab **Authorization**, tapi token belum di-set.

---

## ✅ Solusi: Cara Set Bearer Token di Postman

### Step 1: Login Terlebih Dahulu

1. Buka request **POST Login** di folder Authentication
2. Pastikan body berisi:
```json
{
    "email": "admin@ead.ac.id",
    "password": "password"
}
```
3. Klik **Send**
4. **COPY TOKEN** dari response (bagian `data.token`)

**Contoh Response:**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": { ... },
        "token": "1|sp2lOEz0eWk0fOYiD4bv43hks8RpASsUtNsPstwS059e2844"
    }
}
```

**COPY** bagian token ini: `1|sp2lOEz0eWk0fOYiD4bv43hks8RpASsUtNsPstwS059e2844`

---

### Step 2: Set Authorization di Request Mahasiswa

1. Buka request **GET List Mahasiswa**
2. Klik tab **Authorization** (sudah benar!)
3. Di dropdown **Type**, pilih **Bearer Token**
4. Di kolom **Token**, **PASTE** token yang sudah di-copy
5. Klik **Send**

**Screenshot Guide:**
```
┌─────────────────────────────────────────────┐
│ Authorization                                │
├─────────────────────────────────────────────┤
│ Type: [Bearer Token ▼]                      │
│                                              │
│ Token: [1|sp2lOEz0eWk0fOYiD4bv43hks8Rp...] │
│                                              │
└─────────────────────────────────────────────┘
```

---

## 🎯 Cara Cepat: Gunakan Environment Variable (Recommended)

Agar tidak perlu copy-paste token setiap kali, gunakan environment variable:

### Step 1: Buat Environment
1. Klik icon **Environments** di sidebar kiri Postman
2. Klik **+** untuk create new environment
3. Nama: `Laravel API Local`
4. Tambahkan variable:
   - Variable: `base_url` → Value: `http://127.0.0.1:8000/api`
   - Variable: `auth_token` → Value: (kosongkan dulu)
5. Klik **Save**
6. **Aktifkan environment** ini di dropdown kanan atas

### Step 2: Auto-Save Token Setelah Login
1. Buka request **POST Login**
2. Klik tab **Tests**
3. Paste script ini:
```javascript
var jsonData = pm.response.json();
if (jsonData.data && jsonData.data.token) {
    pm.environment.set("auth_token", jsonData.data.token);
    console.log("Token saved:", jsonData.data.token);
}
```
4. Klik **Save**
5. Sekarang setiap kali login, token akan **otomatis tersimpan**!

### Step 3: Gunakan Variable di Authorization
1. Buka request **GET List Mahasiswa**
2. Tab **Authorization** → Type: **Bearer Token**
3. Di kolom Token, ketik: `{{auth_token}}`
4. Klik **Send**

Sekarang token akan otomatis terambil dari environment variable!

---

## 📋 Checklist Troubleshooting

Jika masih error 401, cek hal berikut:

- [ ] Sudah login dan dapat response success?
- [ ] Token sudah di-copy dengan benar (termasuk angka di depan dan setelah `|`)?
- [ ] Di tab Authorization, Type sudah pilih **Bearer Token**?
- [ ] Token sudah di-paste di kolom Token?
- [ ] Tidak ada spasi di awal/akhir token?
- [ ] Server Laravel masih running (`php artisan serve`)?

---

## 🧪 Test Manual dengan CURL

Untuk memastikan endpoint berfungsi, test dengan curl:

```bash
# 1. Login dulu
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"email":"admin@ead.ac.id","password":"password"}'

# Copy token dari response

# 2. Get mahasiswa (ganti YOUR_TOKEN dengan token yang didapat)
curl -X GET http://127.0.0.1:8000/api/mahasiswa \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN"
```

---

## ✅ Expected Result

Setelah set token dengan benar, response yang benar adalah:

```json
{
    "success": true,
    "message": "List Data Mahasiswa",
    "data": [
        {
            "id": 1,
            "nama": "Ahmad Fauzi",
            "nim": "1201220001",
            "jurusan": "Teknik Informatika",
            "fakultas": "Teknik",
            "created_at": "2025-12-15T16:47:33.000000Z",
            "updated_at": "2025-12-15T16:47:33.000000Z"
        },
        // ... 14 more records
    ]
}
```

---

## 🎬 Video Tutorial (Step by Step)

1. **Login** → Send → Copy token
2. **Get Mahasiswa** → Authorization tab → Bearer Token → Paste token → Send
3. **Success!** ✅

---

## 💡 Pro Tips

1. **Gunakan Environment Variable** untuk auto-save token
2. **Jangan lupa aktifkan environment** di dropdown kanan atas
3. **Token expired?** Login ulang untuk dapat token baru
4. **Import Postman Collection** yang sudah saya sediakan - sudah include auto-save token!

---

**Masih error? Coba langkah berikut:**

1. Restart Postman
2. Clear cookies di Postman (Settings → Clear cookies)
3. Pastikan database sudah di-seed: `php artisan migrate:fresh --seed`
4. Restart Laravel server: `php artisan serve`

---

**Need Help?** Screenshot error dan response yang Anda dapat, saya akan bantu troubleshoot lebih lanjut!
