# NMS App (Network Management System) - Project Summary

## Overview
This is a **Network Management System (NMS) Application** built using the **Yii2 PHP Framework**. The application is currently at version 2.1 and focuses on device monitoring and management with status tracking capabilities.

## Project Type & Technology Stack
- **Framework**: Yii2 (PHP web application framework)
- **Language**: PHP 7.4+
- **Database**: SQL-based (uses ActiveRecord ORM)
- **Frontend**: Bootstrap 5 integration
- **Testing**: Codeception framework
- **Deployment**: Docker support (docker-compose.yml included)

## Core Functionality

### 1. Device Management
- **Device Model**: Manages network devices with name and status fields
- **Device Registration**: Ability to add new devices to the system
- **Status Tracking**: Real-time monitoring of device states

### 2. Status Monitoring System
The application provides a comprehensive device status monitoring dashboard:

#### Device Status Types:
- 🟢 **Online** - Device is operational and reachable
- 🔴 **Offline** - Device is not responding
- ⚪ **Unknown** - Device status cannot be determined

#### Dashboard Features:
- Color-coded device display for quick visual identification
- Automatic sorting by status priority (Online → Offline → Unknown)
- Real-time device statistics showing count for each status type
- Status monitoring dashboard accessible to all users

### 3. User Authentication & Access Control
- **Login System**: User authentication with username/password
- **Role-based Access Control**: 
  - **Admin Users**: Full access including device management
  - **Regular Users**: View-only access to status monitoring
- **Permission Matrix**:
  | Feature | Admin | Regular User |
  |---------|-------|--------------|
  | View Status Monitor | ✅ | ✅ |
  | Add Device | ✅ | ❌ |

### 4. Application Structure

#### Models:
- `Device.php` - Core device entity with name and status fields
- `User.php` - User authentication and management
- `LoginForm.php` - Login form validation
- `ContactForm.php` - Contact form handling

#### Controllers:
- `SiteController.php` - Main application controller handling:
  - Homepage display
  - Device addition (admin only)
  - Status monitoring dashboard
  - User login/logout
  - Contact and about pages

#### Views:
- `index.php` - Homepage
- `status-monitoring.php` - Main monitoring dashboard
- `add-device.php` - Device registration form (admin only)
- `login.php` - User authentication
- `about.php` & `contact.php` - Information pages

### 5. Database Schema
The application uses a simple but effective database structure:

#### Recent Changes (Version 2.1):
- **Device Table Enhancement**: Added `status` column to track device states
- **Migration**: `m250703_142559_add_status_column_to_device_table.php`
  - Default status: 'unknown'
  - Allows tracking of online/offline/unknown states

#### User Management:
- User table with authentication capabilities
- Migration: `m250703_104612_create_user_table.php`

## Development Environment
- **Local Development**: Vagrant support included
- **Docker Support**: `docker-compose.yml` for containerized deployment
- **Asset Management**: Bower integration (`.bowerrc` configuration)
- **Testing**: Codeception test suite configured

## Key Features Summary
1. **Real-time Device Monitoring** - Visual dashboard with color-coded status indicators
2. **Statistics Dashboard** - Live counts of devices by status type
3. **Access Control** - Role-based permissions for admin vs regular users
4. **Responsive Design** - Bootstrap 5 integration for modern UI
5. **Easy Deployment** - Docker and Vagrant support for various environments

## Project Maturity
This appears to be a production-ready application with:
- Proper MVC architecture
- Database migrations for schema management
- Test framework integration
- Security considerations (access controls)
- Documentation (this README and version notes)

The application serves as a lightweight but effective network monitoring solution suitable for small to medium-scale device management scenarios.