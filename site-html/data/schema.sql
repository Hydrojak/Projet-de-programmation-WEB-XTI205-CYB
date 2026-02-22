PRAGMA foreign_keys = ON;

CREATE TABLE IF NOT EXISTS log (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  created_at TEXT NOT NULL DEFAULT (datetime('now')),
  type TEXT NOT NULL,
  sexe TEXT,
  poids_kg REAL,
  taille_cm REAL,
  age INTEGER,
  activite REAL,
  objectif TEXT,
  goal TEXT,
  niveau_prot TEXT,
  bodyfat REAL,
  nom TEXT,
  email TEXT,
  message TEXT,
  inputs_json TEXT NOT NULL,
  results_json TEXT
);