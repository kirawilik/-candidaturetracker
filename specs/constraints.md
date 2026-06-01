# Constraints

## Mandatory Rules

- Use named routes for all routes
- Use FormRequests for validation
- Use Policies for authorization
- Use SoftDeletes for archiving
- Always use eager loading for relationships

---

## Forbidden Rules

- Never use request()->validate() in controllers
- Avoid raw SQL unless absolutely necessary
- Do not duplicate logic across the codebase
- No business logic inside Blade views

---

## Architecture Enforcement

- Follow Laravel best practices strictly
- Keep controllers thin
- Maintain clean separation of concerns