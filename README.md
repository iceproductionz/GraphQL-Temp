# Read Me

- Start Server
```bash
$ composer start
```

- Browser  URL
``` Query
http://localhost:3000/?{user(id:1){id,first_name,last_name}}
```

- Expected Result
```JSON
{
    "data": {
        "user": {
            "id": 1,
            "first_name": "John",
            "last_name": "Doe"
        }
    }
}
```
