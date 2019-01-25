# jenkins deploy
> A jenkins tool to run jobs from command line

## Configure

Run following command to configure the tool. It will ask for jenkins url, username, token (`Profile > Configure > Add New Token`)

```
jenkins configure
```

Once its configured the application is ready for use.

## Deploy

Run following command to deploy the any job
```
jenkins deploy job_name 
```
use `-v` for detailed output.

## todos
[x] Configure command to automate the cli download and configure the configuration  
[ ] Write tests
