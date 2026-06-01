# Testing

## Framework
- PestPHP

---

## Required Test Coverage

### Authentication
- login works
- registration works
- logout works

### Authorization
- users can only access their own data
- policies are enforced correctly

### Candidatures
- can create candidature with valid data
- invalid data is rejected

### Validation
- FormRequests reject invalid input
- required fields enforced

### Archive System
- candidatures can be soft deleted
- candidatures can be restored

### Interviews
- CRUD operations work correctly
- linked to correct candidature

---

## Execution Command

```bash
php artisan test