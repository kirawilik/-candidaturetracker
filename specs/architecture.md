# Architecture

## Style
Classic Laravel MVC architecture

---

## Structure

- Controllers: handle HTTP requests only
- FormRequests: validation layer only
- Policies: authorization layer only
- Models: database relationships only
- Blade Views: presentation layer only
- Services: optional business logic layer

---

## Core Rules

- No business logic in Blade views
- Controllers must remain thin
- Validation must be handled in FormRequests only
- Authorization must be handled in Policies only

---

## Performance Rules

- Always use eager loading for relationships
- Avoid N+1 queries
- Paginate large datasets

---

## Best Practices

- Keep code modular and reusable
- Follow SOLID principles
- Use clear and explicit naming