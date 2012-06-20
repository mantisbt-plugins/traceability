# Traceability
Manstis BugTracker (http://www.mantisbt.org/) Plugin based on selected custom fields to establish issues traceability to both requirements and tests.

## Requirements
1. Plugin for 1.2.10 and above
2. Allow user to fill both requirement and test identifier :
(2.1) According to bug status
(2.2) In different string format
(2.3) Directly in bug summary or in bug update form (no extra view)
3. Build traceability analysis to warn about :
(3.1) issues without requirement 
(3.2) issues without test
4. Build traceability analysis per :
(4.1) Project
(4.2) Version
(4.3) Issue handler
5. Build traceability matrix to requirements per :
(5.1) Project
(5.2) Version
(5.3) Issue handler
(5.4) Requirement identifier
6. Build traceability matrix to tests per :
(6.1) Project
(6.2) Version
(6.3) Issue handler
(6.4) Test identifier
7. Follow changes in bug history

## Technical solution
Solution is based on MantisBT custom fields feature (http://www.mantisbt.org/manual/manual.customizing.mantis.custom.fields.php).
In plugin configuration, user must select/configure :
  - Two custom fields of type STRING :
  -- One for requirement identifier
  -- One for test identifier
  - Issue status threshold to warn about undefined requirement
  - Issue status threshold to warn about undefined test
  - Identifier delimiter in case of requirement / test identifier list