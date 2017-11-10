# Traceability
[Manstis BT](http://www.mantisbt.org/) Plugin based on selected custom fields to establish issues traceability to both requirements and tests.

## Installation
Please refer to the plugin [user guide](https://github.com/mantisbt-plugins/traceability/wiki/User-Guide).

## Requirements
1. Plugin for following Mantis BT versions :
	1. 1.2.10 and above ([master](https://github.com/mantisbt-plugins/traceability/tree/master)) : major version number is equal to 1
	2. 1.3.12 and above ([mantisbt_1_3_X](https://github.com/mantisbt-plugins/traceability/tree/mantisbt_1_3_X)) : major version number is equal to 2
	3. 2.3.0 and above ([mantisbt_2_3_X](https://github.com/mantisbt-plugins/traceability/tree/mantisbt_2_3_X)) : major version number is equal to 3
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
Solution is based on MantisBT [custom fields feature](https://www.mantisbt.org/docs/master-1.2.x/en/administration_guide/admin.customize.html).
In plugin configuration, user must select/configure :
- Two custom fields of type STRING :
    - One for requirement identifier
    - One for test identifier
- Issue status threshold to warn about undefined requirement
- Issue status threshold to warn about undefined test
- Identifier delimiter in case of requirement / test identifier list
