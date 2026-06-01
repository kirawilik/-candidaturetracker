# Project: CandidatureTracker

## Type
Personal productivity web application built with Laravel.

---

## Goal
Help users manage job applications, track interview progress,
archive completed opportunities, and maintain full recruitment history.

---

## Main Stack

- Laravel 13
- Laravel Breeze (Authentication)
- Blade (Frontend)
- MySQL (Database)
- Vite (Assets)
- Pest (Testing)

---

## Core Modules

### Authentication
- Login / Register / Logout
- Protected routes

### Applications Management
- Create, update, delete (soft delete)
- Status tracking
- Priority management

### Interviews Management
- Add interviews per application
- Track stages and results

### Archive System
- Soft delete based archive
- Restore functionality

### Filters
- Filter by status
- Filter by priority

### File Upload
- Upload CV and documents
- Download files

### Testing
- Feature tests using Pest
- Authorization + validation tests

---

## Global Principle
Each module must be implemented following `/specs` definitions.