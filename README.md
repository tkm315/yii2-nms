

---

# ✅ NMS App – Version 2.0  
**Key changes compared to Version 1.0**  

## ✅ Authentication System (Login System)  
- Login page implemented  
- Users can log in with `username` and `password`  
- This user can add Devices:  
  ```
  username: admin  
  password: admin  
  ```  
- Passwords are stored as hashes (secure)  

## ✅ Access Control  
- Every body see **Add Device**  but only Admin can add .
- Admin role defined:  
  - Only `admin` can **Add Device**  
  - Regular users (e.g., `user1`) **cannot** access it  
- If `user1` tries to access **Add Device**:    
  - Displays error message:  
    ```
    Just admins can add device.  
    ```  

## ✅ Improved User Experience  
- Flash messages for success/error notifications  
- Replaces ugly `403 Forbidden` with notif redirects  

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


---

## Routes  
**Add Device**:  
```
http://your-server-ip/basic/web/index.php?r=site/add-device
```

---
