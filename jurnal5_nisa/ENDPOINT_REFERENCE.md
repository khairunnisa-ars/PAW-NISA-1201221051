# 📝 All API Endpoints - Ready to Use

## Base URL
```
http://127.0.0.1:8000/api
```

---

## 🔐 AUTHENTICATION ENDPOINTS

### 1. Register
```
POST http://127.0.0.1:8000/api/register
```
**Body (JSON):**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

---

### 2. Login
```
POST http://127.0.0.1:8000/api/login
```
**Body (JSON):**
```json
{
    "email": "admin@ead.ac.id",
    "password": "password"
}
```

**Available Test Accounts:**
- admin@ead.ac.id / password
- user@ead.ac.id / password
- dosen@ead.ac.id / password

---

### 3. Logout
```
POST http://127.0.0.1:8000/api/logout
```
**Authorization:** Bearer Token required

---

## 👨‍🎓 MAHASISWA ENDPOINTS

> **Note:** All endpoints below require Bearer Token in Authorization header

### 1. Get All Mahasiswa
```
GET http://127.0.0.1:8000/api/mahasiswa
```

---

### 2. Get Mahasiswa by ID
```
GET http://127.0.0.1:8000/api/mahasiswa/1
GET http://127.0.0.1:8000/api/mahasiswa/2
GET http://127.0.0.1:8000/api/mahasiswa/3
```

---

### 3. Create Mahasiswa
```
POST http://127.0.0.1:8000/api/mahasiswa
```
**Body (JSON):**
```json
{
    "nama": "Budi Santoso",
    "nim": "1201221001",
    "jurusan": "Teknik Informatika",
    "fakultas": "Fakultas Teknik"
}
```

**More Examples:**
```json
{
    "nama": "Siti Nurhaliza",
    "nim": "1201221002",
    "jurusan": "Sistem Informasi",
    "fakultas": "Fakultas Teknik"
}
```

```json
{
    "nama": "Ahmad Fauzi",
    "nim": "1201221003",
    "jurusan": "Teknik Elektro",
    "fakultas": "Fakultas Teknik"
}
```

---

### 4. Update Mahasiswa
```
PUT http://127.0.0.1:8000/api/mahasiswa/1
PATCH http://127.0.0.1:8000/api/mahasiswa/1
```
**Body (JSON):**
```json
{
    "nama": "Budi Santoso Updated",
    "nim": "1201221001",
    "jurusan": "Teknik Informatika",
    "fakultas": "Fakultas Teknik"
}
```

---

### 5. Delete Mahasiswa
```
DELETE http://127.0.0.1:8000/api/mahasiswa/1
DELETE http://127.0.0.1:8000/api/mahasiswa/2
```

---

## 📖 MATA KULIAH ENDPOINTS

> **Note:** All endpoints below require Bearer Token in Authorization header

### 1. Get All Mata Kuliah
```
GET http://127.0.0.1:8000/api/matakuliah
```

---

### 2. Get Mata Kuliah by ID
```
GET http://127.0.0.1:8000/api/matakuliah/1
GET http://127.0.0.1:8000/api/matakuliah/2
GET http://127.0.0.1:8000/api/matakuliah/3
```

---

### 3. Create Mata Kuliah
```
POST http://127.0.0.1:8000/api/matakuliah
```
**Body (JSON):**
```json
{
    "nama": "Pemrograman Web",
    "kode": "IF101",
    "sks": 3
}
```

**More Examples:**
```json
{
    "nama": "Basis Data",
    "kode": "IF102",
    "sks": 3
}
```

```json
{
    "nama": "Algoritma dan Struktur Data",
    "kode": "IF103",
    "sks": 4
}
```

```json
{
    "nama": "Jaringan Komputer",
    "kode": "IF104",
    "sks": 3
}
```

---

### 4. Update Mata Kuliah
```
PUT http://127.0.0.1:8000/api/matakuliah/1
PATCH http://127.0.0.1:8000/api/matakuliah/1
```
**Body (JSON):**
```json
{
    "nama": "Pemrograman Web Lanjut",
    "kode": "IF101",
    "sks": 3
}
```

---

### 5. Delete Mata Kuliah
```
DELETE http://127.0.0.1:8000/api/matakuliah/1
DELETE http://127.0.0.1:8000/api/matakuliah/2
```

---

## 🧪 CURL COMMANDS (For Terminal Testing)

### Login
```bash
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@ead.ac.id","password":"password"}'
```

### Get All Mahasiswa (Replace TOKEN with your actual token)
```bash
curl -X GET http://127.0.0.1:8000/api/mahasiswa \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Create Mahasiswa (Replace TOKEN with your actual token)
```bash
curl -X POST http://127.0.0.1:8000/api/mahasiswa \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -d '{"nama":"Test User","nim":"1201221999","jurusan":"Teknik Informatika","fakultas":"Fakultas Teknik"}'
```

### Get All Mata Kuliah (Replace TOKEN with your actual token)
```bash
curl -X GET http://127.0.0.1:8000/api/matakuliah \
  -H "Accept: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

---

## 📋 Quick Reference Table

| Endpoint | Method | Auth | Description |
|----------|--------|------|-------------|
| `/api/register` | POST | ❌ | Register new user |
| `/api/login` | POST | ❌ | Login and get token |
| `/api/logout` | POST | ✅ | Logout current user |
| `/api/mahasiswa` | GET | ✅ | Get all students |
| `/api/mahasiswa/{id}` | GET | ✅ | Get student by ID |
| `/api/mahasiswa` | POST | ✅ | Create new student |
| `/api/mahasiswa/{id}` | PUT/PATCH | ✅ | Update student |
| `/api/mahasiswa/{id}` | DELETE | ✅ | Delete student |
| `/api/matakuliah` | GET | ✅ | Get all courses |
| `/api/matakuliah/{id}` | GET | ✅ | Get course by ID |
| `/api/matakuliah` | POST | ✅ | Create new course |
| `/api/matakuliah/{id}` | PUT/PATCH | ✅ | Update course |
| `/api/matakuliah/{id}` | DELETE | ✅ | Delete course |

---

## 🎯 Testing Workflow

1. **Login** → Copy token from response
2. **Set Authorization** → Bearer Token in Postman
3. **Test GET** → List all data
4. **Test POST** → Create new data
5. **Test GET by ID** → Get specific data
6. **Test PUT/PATCH** → Update data
7. **Test DELETE** → Remove data

---

## ✅ Expected Status Codes

- **200** - OK (Success)
- **201** - Created (Resource created)
- **401** - Unauthorized (Missing/invalid token)
- **404** - Not Found (Resource doesn't exist)
- **422** - Validation Error (Invalid input)

---

**Happy Testing! 🚀**
