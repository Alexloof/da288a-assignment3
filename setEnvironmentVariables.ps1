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


[Environment]::SetEnvironmentVariable("DB_CONNECTION", "$dbConnection")
[Environment]::SetEnvironmentVariable("DB_HOST", "$dbHost")
[Environment]::SetEnvironmentVariable("DB_PORT", "$dbPort")
[Environment]::SetEnvironmentVariable("DB_DATABASE", "$dbDatabase")
[Environment]::SetEnvironmentVariable("DB_USERNAME", "$dbUsername")
[Environment]::SetEnvironmentVariable("DB_PASSWORD", "$dbPassword")
[Environment]::SetEnvironmentVariable("MYSQL_SSL", "$mySqlSSL")
