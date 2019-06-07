Param(
[string]$dbConnection,
[string]$dbHost,
[string]$dbPort,
[string]$dbDatabase,
[string]$dbUsername,
[string]$dbPassword,
[string]$mySqlSSL
)

Write-Output "dbConnection that was passed in from Azure DevOps=>$dbConnection"
Write-Output "dbHost that was passed in from Azure DevOps=>$dbHost"
Write-Output "dbPort that was passed in from Azure DevOps=>$dbPort"
Write-Output "dbDatabase that was passed in from Azure DevOps=>$dbDatabase"
Write-Output "dbUsername that was passed in from Azure DevOps=>$dbUsername"
Write-Output "dbPassword that was passed in from Azure DevOps=>$dbPassword"
Write-Output "mySqlSSL that was passed in from Azure DevOps=>$mySqlSSL"


[Environment]::SetEnvironmentVariable("DB_CONNECTION", "$dbConnection", "Database")
[Environment]::SetEnvironmentVariable("DB_HOST", "$dbHost", "Database")
[Environment]::SetEnvironmentVariable("DB_PORT", "$dbPort", "Database")
[Environment]::SetEnvironmentVariable("DB_DATABASE", "$dbDatabase", "Database")
[Environment]::SetEnvironmentVariable("DB_USERNAME", "$dbUsername", "Database")
[Environment]::SetEnvironmentVariable("DB_PASSWORD", "$dbPassword", "Database")
[Environment]::SetEnvironmentVariable("MYSQL_SSL", "$mySqlSSL", "Database")
