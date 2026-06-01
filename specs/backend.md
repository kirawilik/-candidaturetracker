# Backend Specifications

## Models

### User
- hasMany Candidatures

### Candidature
- belongsTo User
- hasMany Entretiens
- hasMany Attachments (optional)

### Entretien
- belongsTo Candidature

---

## Relationships Diagram

User → Candidatures → Entretiens

---

## Features

### Candidatures
- CRUD operations
- archive (soft delete)
- restore
- filters (status, priority)

### Entretiens
- CRUD operations
- linked to candidature

### Archive System
- SoftDeletes for candidatures
- restore functionality

### Filters
- status filtering
- priority filtering

### File Attachments
- upload files per candidature
- download files
- delete files

---

## Rules

- Use Eloquent relationships
- Use foreign keys
- Use eager loading
- Avoid N+1 queries