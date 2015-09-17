---
title: 'How to Kill kworker !!! (for me)'
---

grep to see what's making the fuss:  
```grep . -r /sys/firmware/acpi/interrupts/```

switch to super user:  
```sudo su```

disable the gpe that is out of control:  
```echo "disable" > /sys/firmware/acpi/interrupts/gpe16```

**TODO**: add to cron and startup

**Note**: Remember, top shows stuff that htop does not!

^^ The Above worked for me on Ubuntu 15.04 running on Late 2014 MacBook Pro.