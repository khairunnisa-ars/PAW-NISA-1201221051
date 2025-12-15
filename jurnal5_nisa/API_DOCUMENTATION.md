# 📚 API Documentation - Laravel Student Management System

## Base URL
```
http://127.0.0.1:8000/api
```

---

## 🔐 Authentication Endpoints

### 1. Register User
**Endpoint:** `POST /register`  
**Access:** Public (No authentication required)

**Request Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Success Response (201):**
```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2025-12-15T16:44:25.000000Z",
            "updated_at": "2025-12-15T16:44:25.000000Z"
        },
        "token": "1|abcdefghijklmnopqrstuvwxyz1234567890"
    }
}
```

**Error Response (422):**
```json
{
    "success": false,
    "message": "Validation Error",
    "errors": {
        "email": ["The email has already been taken."],
        "password": ["The password confirmation does not match."]
    }
}
```

---

### 2. Login User
**Endpoint:** `POST /login`  
**Access:** Public (No authentication required)

**Request Body:**
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2025-12-15T16:44:25.000000Z",
            "updated_at": "2025-12-15T16:44:25.000000Z"
        },
        "token": "2|zyxwvutsrqponmlkjihgfedcba0987654321"
    }
}
```

**Error Response (401):**
```json
{
    "success": false,
    "message": "Invalid credentials"
}
```

---

### 3. Logout User
**Endpoint:** `POST /logout`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Logout successful"
}
```

---

## 👨‍🎓 Mahasiswa (Student) Endpoints

> **Note:** All mahasiswa endpoints require authentication. Include Bearer Token in Authorization header.

### 1. Get All Mahasiswa
**Endpoint:** `GET /mahasiswa`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "List Data Mahasiswa",
    "data": [
        {
            "id": 1,
            "nama": "Budi Santoso",
            "nim": "1201221001",
            "jurusan": "Teknik Informatika",
            "fakultas": "Fakultas Teknik",
            "created_at": "2025-12-15T16:44:25.000000Z",
            "updated_at": "2025-12-15T16:44:25.000000Z"
        },
        {
            "id": 2,
            "nama": "Siti Nurhaliza",
            "nim": "1201221002",
            "jurusan": "Sistem Informasi",
            "fakultas": "Fakultas Teknik",
            "created_at": "2025-12-15T16:44:25.000000Z",
            "updated_at": "2025-12-15T16:44:25.000000Z"
        }
    ]
}
```

---

### 2. Get Mahasiswa Detail
**Endpoint:** `GET /mahasiswa/{id}`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Example:** `GET /mahasiswa/1`

**Success Response (200):**
```json
{
    "success": true,
    "message": "Detail Data Mahasiswa!",
    "data": {
        "id": 1,
        "nama": "Budi Santoso",
        "nim": "1201221001",
        "jurusan": "Teknik Informatika",
        "fakultas": "Fakultas Teknik",
        "created_at": "2025-12-15T16:44:25.000000Z",
        "updated_at": "2025-12-15T16:44:25.000000Z"
    }
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Data Mahasiswa Tidak Ditemukan!",
    "data": null
}
```

---

### 3. Create Mahasiswa
**Endpoint:** `POST /mahasiswa`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
Content-Type: application/json
```

**Request Body:**
```json
{
    "nama": "Ahmad Fauzi",
    "nim": "1201221003",
    "jurusan": "Teknik Elektro",
    "fakultas": "Fakultas Teknik"
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Data Mahasiswa Berhasil Ditambahkan!",
    "data": {
        "id": 3,
        "nama": "Ahmad Fauzi",
        "nim": "1201221003",
        "jurusan": "Teknik Elektro",
        "fakultas": "Fakultas Teknik",
        "created_at": "2025-12-15T16:44:25.000000Z",
        "updated_at": "2025-12-15T16:44:25.000000Z"
    }
}
```

**Error Response (422):**
```json
{
    "success": false,
    "message": "Validation Error",
    "errors": {
        "nim": ["The nim has already been taken."],
        "nama": ["The nama field is required."]
    }
}
```

---

### 4. Update Mahasiswa
**Endpoint:** `PUT /mahasiswa/{id}` or `PATCH /mahasiswa/{id}`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
Content-Type: application/json
```

**Example:** `PUT /mahasiswa/1`

**Request Body:**
```json
{
    "nama": "Budi Santoso Updated",
    "nim": "1201221001",
    "jurusan": "Teknik Informatika",
    "fakultas": "Fakultas Teknik"
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Data Mahasiswa Berhasil Diubah!",
    "data": {
        "id": 1,
        "nama": "Budi Santoso Updated",
        "nim": "1201221001",
        "jurusan": "Teknik Informatika",
        "fakultas": "Fakultas Teknik",
        "created_at": "2025-12-15T16:44:25.000000Z",
        "updated_at": "2025-12-15T16:50:00.000000Z"
    }
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Data Mahasiswa Tidak Ditemukan!",
    "data": null
}
```

---

### 5. Delete Mahasiswa
**Endpoint:** `DELETE /mahasiswa/{id}`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Example:** `DELETE /mahasiswa/1`

**Success Response (200):**
```json
{
    "success": true,
    "message": "Data Mahasiswa Berhasil Dihapus!",
    "data": null
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Data Mahasiswa Tidak Ditemukan!",
    "data": null
}
```

---

## 📖 Mata Kuliah (Course) Endpoints

> **Note:** All matakuliah endpoints require authentication. Include Bearer Token in Authorization header.

### 1. Get All Mata Kuliah
**Endpoint:** `GET /matakuliah`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "List Data Matakuliah",
    "data": [
        {
            "id": 1,
            "nama": "Pemrograman Web",
            "kode": "IF101",
            "sks": 3,
            "created_at": "2025-12-15T16:44:25.000000Z",
            "updated_at": "2025-12-15T16:44:25.000000Z"
        },
        {
            "id": 2,
            "nama": "Basis Data",
            "kode": "IF102",
            "sks": 4,
            "created_at": "2025-12-15T16:44:25.000000Z",
            "updated_at": "2025-12-15T16:44:25.000000Z"
        }
    ]
}
```

---

### 2. Get Mata Kuliah Detail
**Endpoint:** `GET /matakuliah/{id}`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Example:** `GET /matakuliah/1`

**Success Response (200):**
```json
{
    "success": true,
    "message": "Detail Data Matakuliah!",
    "data": {
        "id": 1,
        "nama": "Pemrograman Web",
        "kode": "IF101",
        "sks": 3,
        "created_at": "2025-12-15T16:44:25.000000Z",
        "updated_at": "2025-12-15T16:44:25.000000Z"
    }
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Data Matakuliah Tidak Ditemukan!",
    "data": null
}
```

---

### 3. Create Mata Kuliah
**Endpoint:** `POST /matakuliah`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
Content-Type: application/json
```

**Request Body:**
```json
{
    "nama": "Algoritma dan Struktur Data",
    "kode": "IF103",
    "sks": 4
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Data Matakuliah Berhasil Ditambahkan!",
    "data": {
        "id": 3,
        "nama": "Algoritma dan Struktur Data",
        "kode": "IF103",
        "sks": 4,
        "created_at": "2025-12-15T16:44:25.000000Z",
        "updated_at": "2025-12-15T16:44:25.000000Z"
    }
}
```

**Error Response (422):**
```json
{
    "success": false,
    "message": "Validation Error",
    "errors": {
        "kode": ["The kode has already been taken."],
        "sks": ["The sks must be between 1 and 6."]
    }
}
```

---

### 4. Update Mata Kuliah
**Endpoint:** `PUT /matakuliah/{id}` or `PATCH /matakuliah/{id}`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
Content-Type: application/json
```

**Example:** `PUT /matakuliah/1`

**Request Body:**
```json
{
    "nama": "Pemrograman Web Lanjut",
    "kode": "IF101",
    "sks": 3
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Data Matakuliah Berhasil Diubah!",
    "data": {
        "id": 1,
        "nama": "Pemrograman Web Lanjut",
        "kode": "IF101",
        "sks": 3,
        "created_at": "2025-12-15T16:44:25.000000Z",
        "updated_at": "2025-12-15T16:50:00.000000Z"
    }
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Data Matakuliah Tidak Ditemukan!",
    "data": null
}
```

---

### 5. Delete Mata Kuliah
**Endpoint:** `DELETE /matakuliah/{id}`  
**Access:** Protected (Requires Bearer Token)

**Headers:**
```
Authorization: Bearer {your_token_here}
```

**Example:** `DELETE /matakuliah/1`

**Success Response (200):**
```json
{
    "success": true,
    "message": "Data Matakuliah Berhasil Dihapus!",
    "data": null
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Data Matakuliah Tidak Ditemukan!",
    "data": null
}
```

---

## 🔑 How to Use in Postman

### Step 1: Register or Login
1. **Register** a new user using `POST /api/register`
2. Or **Login** with existing credentials using `POST /api/login`
3. **Copy the token** from the response

### Step 2: Set Authorization
1. Go to any protected endpoint (mahasiswa or matakuliah)
2. Click on **Authorization** tab
3. Select **Type:** `Bearer Token`
4. **Paste the token** you copied from login/register

### Step 3: Test Endpoints
Now you can test all endpoints:
- ✅ GET all data
- ✅ GET detail by ID
- ✅ POST create new data
- ✅ PUT/PATCH update data
- ✅ DELETE remove data

---

## 📋 Complete Endpoint Summary

| Method | Endpoint | Auth Required | Description |
|--------|----------|---------------|-------------|
| POST | `/api/register` | ❌ No | Register new user |
| POST | `/api/login` | ❌ No | Login user |
| POST | `/api/logout` | ✅ Yes | Logout user |
| GET | `/api/mahasiswa` | ✅ Yes | Get all students |
| GET | `/api/mahasiswa/{id}` | ✅ Yes | Get student detail |
| POST | `/api/mahasiswa` | ✅ Yes | Create new student |
| PUT/PATCH | `/api/mahasiswa/{id}` | ✅ Yes | Update student |
| DELETE | `/api/mahasiswa/{id}` | ✅ Yes | Delete student |
| GET | `/api/matakuliah` | ✅ Yes | Get all courses |
| GET | `/api/matakuliah/{id}` | ✅ Yes | Get course detail |
| POST | `/api/matakuliah` | ✅ Yes | Create new course |
| PUT/PATCH | `/api/matakuliah/{id}` | ✅ Yes | Update course |
| DELETE | `/api/matakuliah/{id}` | ✅ Yes | Delete course |

---

## ⚠️ Common Errors

### 401 Unauthorized
```json
{
    "message": "Unauthenticated."
}
```
**Solution:** Make sure you include Bearer Token in Authorization header

### 404 Not Found
```json
{
    "success": false,
    "message": "Data ... Tidak Ditemukan!",
    "data": null
}
```
**Solution:** Check if the ID exists in database

### 422 Validation Error
```json
{
    "success": false,
    "message": "Validation Error",
    "errors": { ... }
}
```
**Solution:** Check request body and fix validation errors

---

## 🎯 Testing Workflow

1. **Register** → Get token
2. **Login** → Get token (if already registered)
3. **Create Mahasiswa** → Test POST endpoint
4. **Get All Mahasiswa** → Test GET endpoint
5. **Get Detail Mahasiswa** → Test GET by ID
6. **Update Mahasiswa** → Test PUT/PATCH endpoint
7. **Delete Mahasiswa** → Test DELETE endpoint
8. Repeat steps 3-7 for **Mata Kuliah**
9. **Logout** → Test logout endpoint

---

**Happy Testing! 🚀**
