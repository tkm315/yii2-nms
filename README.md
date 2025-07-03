

---

# ✅ NMS App – Version 2.0  
**Key changes compared to Version 1.0**  

## ✅ Authentication System (Login System)  
- Login page implemented  
- Users can log in with `username` and `password`  
- Default user credentials:  
  ```
  username: admin  
  password: admin  
  ```  
- Passwords are stored as hashes (secure)  

## ✅ Access Control  
- Only logged-in users can access **Add Device**  
- Admin role defined:  
  - Only `admin` can **Add Device**  
  - Regular users (e.g., `user1`) **cannot** access it  
- If `user1` tries to access **Add Device**:  
  - Redirects to `index` page  
  - Displays elegant error message:  
    ```
    Just admins can add device.  
    ```  

## ✅ Improved User Experience  
- Flash messages for success/error notifications  
- Replaces ugly `403 Forbidden` with smooth redirects  

---

## Database  
- `user` table created  
- New users can be added via SQL:  
  ```sql
  INSERT INTO user (username, password_hash) VALUES ('new_user', '[hashed_password]');
  ```

### Default Users  
| Username | Password |  
|----------|----------|  
| `admin`  | `admin`  |  
| `user1`  | `1`      |  

*(Note: Change default passwords in production!)*  

---

## Routes  
**Add Device**:  
```
http://your-server-ip/basic/web/index.php?r=site/add-device
```

---

### Customization Tips for GitHub:  
1. **Security Warning**: Add this note in bold:  
   ```markdown
   **⚠️ WARNING**: Default passwords (`admin`, `1`) are for demo only. Change them in production!  
   ```  
2. **Code Formatting**: Use syntax highlighting for SQL/PHP:  
   ````markdown
   ```sql
   SELECT * FROM user;
   ```
   ````  
3. **Screenshots**: Consider adding:  
   ```markdown
   ![Login Page](screenshots/login.png)  
   ```  

