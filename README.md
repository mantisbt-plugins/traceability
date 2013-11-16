# Traceability
Manstis BugTracker (http://www.mantisbt.org/) Plugin based on selected custom fields to establish issues traceability to both requirements and tests.

## Requirements
1. Plugin for 1.2.10 and above
2. Allow user to fill both requirement and test identifier :
    1. According to bug status
    2. In different string format
    3. Directly in bug summary or in bug update form (no extra view)
3. Build traceability analysis to warn about :
    1. Issues without requirement 
    2. Issues without test
4. Build traceability analysis per :
    1. Project
    2. Version
    3. Issue handler
5. Build traceability matrix to requirements per :
    1. Project
    2. Version
    3. Issue handler
    4. Requirement identifier
6. Build traceability matrix to tests per :
    1. Project
    2. Version
    3. Issue handler
    4. Test identifier
7. Follow changes in bug history

## Technical solution
Solution is based on MantisBT [custom fields feature](http://www.mantisbt.org/manual/manual.customizing.mantis.custom.fields.php).
In plugin configuration, user must select/configure :

- Two custom fields of type STRING :
    - One for requirement identifier
    - One for test identifier
- Issue status threshold to warn about undefined requirement
- Issue status threshold to warn about undefined test
- Identifier delimiter in case of requirement / test identifier list
