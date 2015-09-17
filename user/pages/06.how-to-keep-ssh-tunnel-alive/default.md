---
title: 'How to Keep a SSH tunnel alive'
---

# How to Keep a SSH tunnel alive
Run this from host pointing at target which what DNS points to.  
## Example:  
```autossh -M 20000 -f -N root@targ.et -R 32768:localhost:32768 -C```