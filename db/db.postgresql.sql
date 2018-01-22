CREATE TABLE IF NOT EXISTS profiles (
  pfl_id SERIAL PRIMARY KEY,
  pfl_name_1 VARCHAR(128) NOT NULL,
  pfl_name_2 VARCHAR(128),
  pfl_name_3 VARCHAR(128),
  pfl_name_4 VARCHAR(128),
  pfl_name_5 VARCHAR(128)
);

CREATE INDEX profiles_name_idx ON profiles(pfl_name_1);

CREATE TABLE IF NOT EXISTS clients (
  cln_id SERIAL PRIMARY KEY,
  cln_name_1 VARCHAR(128) NOT NULL,
  cln_name_2 VARCHAR(128) NOT NULL,
  cln_name_3 VARCHAR(128) NOT NULL,
  cln_name_4 VARCHAR(128) NOT NULL
);

CREATE INDEX clients_name_idx ON clients(cln_name_1);

CREATE TABLE IF NOT EXISTS invoices (
  ivc_id SERIAL PRIMARY KEY,
  ivc_number VARCHAR(128) NOT NULL UNIQUE,
  ivc_pfl_id INTEGER NOT NULL REFERENCES profiles(pfl_id),
  ivc_cln_id INTEGER NOT NULL REFERENCES clients(cln_id),
  ivc_date_create DATE NOT NULL,
  ivc_date_sale DATE NOT NULL,
  ivc_name VARCHAR(128) NOT NULL,
  ivc_count INT NOT NULL,
  ivc_unit VARCHAR(128) NOT NULL,
  ivc_price DECIMAL(10,2) NOT NULL,
  ivc_name_2 VARCHAR(128),
  ivc_count_2 INT,
  ivc_unit_2 VARCHAR(128),
  ivc_price_2 DECIMAL(10,2),
  ivc_name_3 VARCHAR(128),
  ivc_count_3 INT,
  ivc_unit_3 VARCHAR(128),
  ivc_price_3 DECIMAL(10,2),
  ivc_value DECIMAL(10,2) NOT NULL,
  ivc_date_payment DATE NOT NULL,
  ivc_payment_method VARCHAR(256) NOT NULL,
  ivc_ts_insert TIMESTAMP NOT NULL,
  ivc_ts_update TIMESTAMP NOT NULL
);

CREATE INDEX invoices_pfl_idx ON invoices(ivc_pfl_id);
CREATE INDEX invoices_cln_idx ON invoices(ivc_cln_id);
CREATE INDEX invoices_date_idx ON invoices(ivc_date_create);
