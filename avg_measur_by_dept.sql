SELECT admissions.adm_id, departments.dept_name, 
avg(measurements.measure_value)
FROM Admissions, Departments, Measurements 
WHERE admissions.dept_id=departments.dept_id AND
measurements.adm_id=admissions.adm_id
GROUP BY departments.dept_name;