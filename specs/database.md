# Database Design

## Table: candidatures

- id
- user_id (FK → users)
- company_name (string)
- job_title (string)
- job_url (nullable string)
- status (enum/string)
- priority (enum/string)
- notes (nullable text)
- applied_at (date)
- deleted_at (soft deletes)
- timestamps

---

## Table: entretiens

- id
- candidature_id (FK → candidatures)
- type (string)
- scheduled_at (datetime)
- notes (nullable text)
- result (string/nullable)
- timestamps

---

## Relationships

User 1 → N Candidatures  
Candidature 1 → N Entretiens

---

## Rules

- Use foreign keys with constraints
- Use SoftDeletes for candidatures
- Use proper indexing where needed
- Keep schema normalized