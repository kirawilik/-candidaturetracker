# Security

## Authentication
- Laravel Breeze handles authentication
- Login / Register / Logout required

---

## Authorization
- Policies required for all models:
  - CandidaturePolicy
  - EntretienPolicy

---

## Access Control Rules

- Users can only access their own resources
- All routes must be protected with auth middleware
- No public access to application data

---

## CSRF Protection

- All forms must include CSRF token (@csrf)

---

## Policy Rules

- CandidaturePolicy controls access to candidatures
- EntretienPolicy controls access to interviews

---

## Global Rule

Security must be enforced at:
- Route level
- Policy level
- Controller level (if needed)