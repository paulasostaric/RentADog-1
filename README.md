# RentADog

This project uses a MySQL database. Database connection details are read from environment variables. If a variable is not set, the application falls back to a default value.

## Environment Variables

- `DB_HOST` – database host (default: `127.0.0.1`)
- `DB_NAME` – database name (default: `rentadog`)
- `DB_USER` – database user (default: `root`)
- `DB_PASS` – database password (default: empty)

Set these variables in your shell before running the PHP application, e.g.:

```bash
export DB_HOST=127.0.0.1
export DB_NAME=rentadog
export DB_USER=root
export DB_PASS=secret
```

Running the application without setting them will use the default values listed above.
