SELECT * FROM patients LEFT OUTER JOIN admissions ON PATIENTS.pat_id=admissions.pat_id;