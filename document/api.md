# API & Integration Documentation - BLUD SMKN 2 Purwakarta

This document outlines the Application Programming Interface (**API**) specifications, covering third-party (external) services as well as *Internal Endpoints / AJAX APIs* utilized for dynamic interactivity in the **BLUD SMKN 2 Purwakarta** system.

---

## 1. API Integration Map

```mermaid
graph LR
    subgraph Client / Frontend
        Browser[Web Browser / User]
    end

    subgraph Internal Laravel App
        WebRoutes[Routes /web.php]
        PublicCtrl[Public & Contact Controllers]
        AdminCtrl[Admin Controllers & AJAX Endpoints]
        GoogleCtrl[GoogleAuthController]
    end

    subgraph External Services
        GoogleOAuth[Google OAuth 2.0 API]
        GoogleUserInfo[Google UserInfo API]
        GoogleMaps[Google Maps Embed API]
    end

    Browser -->|Submit Contact / AJAX Status| AdminCtrl
    Browser -->|Open Location Map| GoogleMaps
    Browser -->|Click Google Sign-In| GoogleCtrl
    GoogleCtrl -->|Redirect Auth| GoogleOAuth
    GoogleOAuth -->|Return Auth Code| GoogleCtrl
    GoogleCtrl -->|Exchange Token & Fetch Profile| GoogleUserInfo
```

---

## 2. External API Integrations

### 2.1. Google OAuth 2.0 API (Single Sign-On)
Used to securely authenticate users using their official Google accounts without requiring manual password management.

#### A. Authorization Endpoint
- **URL**: `https://accounts.google.com/o/oauth2/v2/auth`
- **Method**: `GET`
- **Handling Controller**: `App\Http\Controllers\GoogleAuthController::redirect()`
- **URL Parameters**:
  | Parameter | Type | Example Value | Description |
  |---|---|---|---|
  | `client_id` | String | `123...apps.googleusercontent.com` | OAuth Client ID from Google Cloud Console |
  | `redirect_uri` | String | `http://localhost:8000/auth/google/callback` | Registered callback redirect URI |
  | `response_type` | String | `code` | Expects authorization code grant |
  | `scope` | String | `openid email profile` | Access scopes for identity, email, and profile |

#### B. Token Exchange Endpoint
- **URL**: `https://oauth2.googleapis.com/token`
- **Method**: `POST`
- **Content-Type**: `application/x-www-form-urlencoded`
- **Handling Controller**: `App\Http\Controllers\GoogleAuthController::callback()`
- **Request Body**:
  ```json
  {
    "client_id": "GOOGLE_CLIENT_ID",
    "client_secret": "GOOGLE_CLIENT_SECRET",
    "code": "4/0AdLIrYe...",
    "grant_type": "authorization_code",
    "redirect_uri": "GOOGLE_REDIRECT_URI"
  }
  ```
- **Example Response**:
  ```json
  {
    "access_token": "ya29.a0AfH6SM...",
    "expires_in": 3599,
    "token_type": "Bearer",
    "scope": "openid https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",
    "id_token": "eyJhbGciOiJSUzI1NiIs..."
  }
  ```

#### C. User Profile Endpoint
- **URL**: `https://www.googleapis.com/oauth2/v2/userinfo`
- **Method**: `GET`
- **Headers**:
  ```http
  Authorization: Bearer ya29.a0AfH6SM...
  ```
- **Example Response**:
  ```json
  {
    "id": "1049283748291029384",
    "email": "siswa@smkn2purwakarta.sch.id",
    "verified_email": true,
    "name": "Budi Santoso",
    "given_name": "Budi",
    "family_name": "Santoso",
    "picture": "https://lh3.googleusercontent.com/a/ACg8oc...",
    "locale": "id"
  }
  ```

---

### 2.2. Google Maps Embed API
Embedded on the **Contact** (`/kontak`) and **Profile** (`/profil`) pages to present interactive satellite and road maps of SMKN 2 Purwakarta.

- **Base URL**: `https://www.google.com/maps/embed/v1/place` or standard Google Maps iframe embed.
- **Coordinates / Location**: `SMK Negeri 2 Purwakarta (Jl. Jend. Ahmad Yani No.98, Cipaising, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41113)`
- **Display Style**: Responsive iframe with rounded borders and modern box shadows.

---

## 3. Internal REST & AJAX Endpoints Catalog

The system provides dedicated internal endpoints to support asynchronous frontend interactions (AJAX) and RESTful CRUD workflows.

### 3.1. Organizational Structure Tree API
Fetches the organizational chart hierarchy formatted as a nested JSON tree.

- **Route**: `GET /admin/organigrams-tree`
- **Middleware**: `auth`, `admin`
- **Response Status**: `200 OK`
- **Example JSON Response**:
  ```json
  [
    {
      "id": 1,
      "name": "Drs. H. Pimpinan BLUD, M.Pd",
      "position": "Principal / Head of BLUD",
      "department": "Executive Leadership",
      "photo": "/storage/organigram/kepala.jpg",
      "children": [
        {
          "id": 2,
          "name": "Ahmad Subagja, S.T",
          "position": "Head of Production Unit",
          "department": "Services & Production Division",
          "parent_id": 1,
          "children": []
        }
      ]
    }
  ]
  ```

---

### 3.2. Toggle Facility Status
Instantly toggles the operational and availability status of a facility.

- **Route**: `PATCH /admin/facilities/{facility}/status`
- **Headers**:
  ```http
  X-CSRF-TOKEN: {csrf_token}
  Content-Type: application/json
  Accept: application/json
  ```
- **Request Body**:
  ```json
  {
    "status": "available" 
  }
  ```
  *(Status options: `available`, `maintenance`, `unavailable`)*
- **Response**:
  ```json
  {
    "success": true,
    "message": "Facility status successfully updated.",
    "new_status": "available"
  }
  ```

---

### 3.3. Toggle Vocational Service Status
Toggles the public visibility status of a product or service.

- **Route**: `PATCH /admin/services/{service}/status`
- **Headers**: `X-CSRF-TOKEN`, `Content-Type: application/json`
- **Request Body**:
  ```json
  {
    "status": "active"
  }
  ```
  *(Status options: `active`, `inactive`)*
- **Response**:
  ```json
  {
    "success": true,
    "message": "Service status successfully updated.",
    "new_status": "active"
  }
  ```

---

### 3.4. User Management AJAX Endpoints

#### A. Toggle Account Active State
- **Route**: `PATCH /admin/users/{user}/toggle-active`
- **Response**:
  ```json
  {
    "success": true,
    "is_active": false,
    "message": "User account status successfully deactivated."
  }
  ```

#### B. Update User Role
- **Route**: `PATCH /admin/users/{user}/role`
- **Request Body**:
  ```json
  {
    "role": "admin"
  }
  ```
  *(Role options: `admin`, `viewer`)*
- **Response**:
  ```json
  {
    "success": true,
    "message": "User role successfully changed to admin."
  }
  ```

---

### 3.5. Contact Messages Management (Contact Inbox)

#### A. Mark Message as Read
- **Route**: `PATCH /admin/contact-messages/{contactMessage}/read`
- **Response**:
  ```json
  {
    "success": true,
    "status": "read"
  }
  ```

#### B. Mark Message as Replied
- **Route**: `PATCH /admin/contact-messages/{contactMessage}/replied`
- **Response**:
  ```json
  {
    "success": true,
    "status": "replied"
  }
  ```

---

### 3.6. Clear Activity Logs
Purges audit log entries older than 30 days.

- **Route**: `DELETE /admin/activity-logs/clear`
- **Response**:
  ```json
  {
    "success": true,
    "message": "Successfully cleared 142 expired activity logs."
  }
  ```

---

### 3.7. Public Contact Message Submission
Handles inquiries or business proposals submitted by the public.

- **Route**: `POST /kontak`
- **Headers**: Form Data / Multi-part
- **Request Body**:
  | Field | Validation Rule | Description |
  |---|---|---|
  | `name` | `required\|string\|max:255` | Full name |
  | `email` | `required\|email\|max:255` | Valid email address |
  | `phone` | `required\|string\|max:20` | Contact phone / WhatsApp |
  | `subject` | `required\|string\|max:255` | Message subject |
  | `message` | `required\|string` | Message body content |
- **Response**: Redirect back with session flash message `success`.
