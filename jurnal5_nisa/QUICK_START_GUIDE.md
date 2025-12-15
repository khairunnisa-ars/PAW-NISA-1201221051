# 🚀 Quick Start Guide - Testing API

## Prerequisites
- ✅ Laravel server is running: `php artisan serve`
- ✅ Database is migrated: `php artisan migrate`
- ✅ Postman installed

---

## Method 1: Import Postman Collection (Recommended)

### Step 1: Import Collection
1. Open Postman
2. Click **Import** button (top left)
3. Select the file: `Postman_Collection.json`
4. Collection "Laravel Student Management API" will appear in your sidebar

### Step 2: Test Authentication
1. Open **Authentication** → **Login**
2. Click **Send**
3. ✅ Token will be **automatically saved** to environment variable
4. You can now use all protected endpoints!

### Step 3: Test Mahasiswa Endpoints
1. **Create Mahasiswa** → Click Send
2. **List Mahasiswa** → Click Send (see all data)
3. **Get Mahasiswa** → Change ID if needed → Click Send
4. **Update Mahasiswa** → Change ID and data → Click Send
5. **Delete Mahasiswa** → Change ID → Click Send

### Step 4: Test Mata Kuliah Endpoints
Same steps as Mahasiswa!

---

## Method 2: Manual Setup in Postman

### Step 1: Register/Login

**Request:**
```
POST http://127.0.0.1:8000/api/login
```

**Headers:**
```
Accept: application/json
Content-Type: application/json
```

**Body (raw JSON):**
```json
{
    "email": "test@example.com",
    "password": "password123"
}
```

**Click Send** → Copy the `token` from response

---

### Step 2: Set Authorization for Protected Endpoints

For all endpoints like `/mahasiswa` and `/matakuliah`:

1. Go to **Authorization** tab
2. Type: Select **Bearer Token**
3. Token: Paste your token here
4. Click **Send**

---

## 📝 Sample Test Sequence

### 1️⃣ Login
```
POST /api/login
Body: { "email": "test@example.com", "password": "password123" }
→ Copy token
```

### 2️⃣ Create Mahasiswa
```
POST /api/mahasiswa
Authorization: Bearer {token}
Body: {
    "nama": "Budi Santoso",
    "nim": "1201221001",
    "jurusan": "Teknik Informatika",
    "fakultas": "Fakultas Teknik"
}
```

### 3️⃣ Get All Mahasiswa
```
GET /api/mahasiswa
Authorization: Bearer {token}
```

### 4️⃣ Get Mahasiswa Detail
```
GET /api/mahasiswa/1
Authorization: Bearer {token}
```

### 5️⃣ Update Mahasiswa
```
PUT /api/mahasiswa/1
Authorization: Bearer {token}
Body: {
    "nama": "Budi Santoso Updated",
    "nim": "1201221001",
    "jurusan": "Teknik Informatika",
    "fakultas": "Fakultas Teknik"
}
```

### 6️⃣ Delete Mahasiswa
```
DELETE /api/mahasiswa/1
Authorization: Bearer {token}
```

### 7️⃣ Repeat for Mata Kuliah
Same pattern with `/api/matakuliah` endpoints!

---

## ⚠️ Troubleshooting

### Error: "Unauthenticated"
**Solution:** 
- Make sure you've logged in
- Copy the token from login response
- Add Bearer Token in Authorization tab

### Error: "Data Tidak Ditemukan"
**Solution:**
- Check if the ID exists
- Create data first before trying to get/update/delete

### Error: "Validation Error"
**Solution:**
- Check required fields
- Make sure NIM/Kode is unique
- Check data types (sks must be integer 1-6)

---

## 🎯 Expected Responses

### ✅ Success Response
```json
{
    "success": true,
    "message": "...",
    "data": { ... }
}
```

### ❌ Error Response
```json
{
    "success": false,
    "message": "...",
    "errors": { ... }
}
```

---

## 📊 Testing Checklist

- [ ] Register new user
- [ ] Login with credentials
- [ ] Create mahasiswa
- [ ] Get all mahasiswa
- [ ] Get mahasiswa detail
- [ ] Update mahasiswa
- [ ] Delete mahasiswa
- [ ] Create mata kuliah
- [ ] Get all mata kuliah
- [ ] Get mata kuliah detail
- [ ] Update mata kuliah
- [ ] Delete mata kuliah
- [ ] Logout

---

## 💡 Pro Tips

1. **Auto-save token**: Use Postman Tests tab to auto-save token
   ```javascript
   var jsonData = pm.response.json();
   pm.environment.set("auth_token", jsonData.data.token);
   ```

2. **Use environment variables**: 
   - Create environment with `base_url` = `http://127.0.0.1:8000/api`
   - Create variable `auth_token` for token storage

3. **Test in order**: Always login first before testing protected endpoints

4. **Check response codes**:
   - 200/201 = Success
   - 401 = Unauthorized (need token)
   - 404 = Not found
   - 422 = Validation error

---

**Happy Testing! 🎉**
