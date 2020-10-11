# pThreads

Divide background processing in N parallel tasks (N is configurable). Tasks are taken from JSON file and have simple functions - write in log DATETIME and parameters.

 ## Requirements
- xampp 7.2+
- ZTS - Zend Thread Safe (included in xampp 7.2+)
- pthreads extension
## Assets for 
- VC 15
- Architecture x64
- OS Windows
## Installation
1. Copy php_pthreads.dll to xampp\php\ext
2. Copy pthreadVC2.dll to xampp\php
3. Add pthreadVC2.dll to PATH
4. Add extension to xampp\php\php.ini:
<pre><code>extension = php_pthreads.dll
</code></pre>

## Execution !!!Most Important !!!
Dont run apache server

Open CMD and CD c:\xampp\htdocs\pThreads (or whatever or path is)

<pre><code>php index.php
</code></pre>
