# Request Blocklist

This project now supports DB-backed blacklist rules for blocking abusive traffic and spam submissions before they are processed.

## Supported rule attributes

- `ip`
- `user_agent`
- `path`
- `method`
- `referer`
- `query_string`
- `host`
- `email`
- `email_domain`
- `phone`
- `name`
- `message`

## Supported match types

- `exact`
- `contains`
- `starts_with`
- `ends_with`
- `cidr`

`cidr` is only valid for the `ip` attribute.

## Example rules

Block a single IP:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, notes)
VALUES ('ip', 'exact', '203.0.113.50', 'Known attacker');
```

Block an IP range:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, notes)
VALUES ('ip', 'cidr', '203.0.113.0/24', 'Malicious subnet');
```

Block a spam email domain:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, notes)
VALUES ('email_domain', 'exact', 'mailinator.com', 'Disposable email domain');
```

Block a bot user agent:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, notes)
VALUES ('user_agent', 'contains', 'sqlmap', 'Automated attack scanner');
```

Block probing on a path:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, notes)
VALUES ('path', 'contains', '/wp-admin', 'WordPress probe');
```

Add a custom response message:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, blockMessage, notes)
VALUES ('ip', 'exact', '198.51.100.25', 'Access denied.', 'Temporary manual block');
```

Expire a temporary block:

```sql
INSERT INTO request_block_rules (attribute, matchType, ruleValue, expiresAt, notes)
VALUES ('ip', 'exact', '198.51.100.25', DATE_ADD(NOW(), INTERVAL 7 DAY), 'One-week block');
```

Disable a rule without deleting it:

```sql
UPDATE request_block_rules
SET active = 0
WHERE id = 1;
```
