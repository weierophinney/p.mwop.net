CREATE TABLE user
(
    user_id       INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    username      VARCHAR(255) DEFAULT NULL UNIQUE,
    email         VARCHAR(255) DEFAULT NULL UNIQUE,
    display_name  VARCHAR(50) DEFAULT NULL,
    password      VARCHAR(128) NOT NULL
);

CREATE TABLE user_provider 
(
  user_id INTEGER NOT NULL,
  provider_id VARCHAR(50) NOT NULL,
  provider VARCHAR(255) NOT NULL,
  PRIMARY KEY(user_id,provider_id),
  UNIQUE(provider_id,provider),
  FOREIGN KEY(user_id) REFERENCES user(user_id)
);
