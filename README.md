## appi.bzzlab.ch
<small>Author: [Daniel Garavaldi](mailto:daniel.garavaldi@bzz.ch)</small>
### Intro
Sharing the teaching material with new Appi teacher leads to a new directory structure.
On the one hand the website [appi.bzzlab.ch](http://appi.bzzlab.ch) with its 
includes and design shouldn't be ammended. On the other hand the teaching material is
personel and should be changed any time without interfering with data of other teachers.

In order to support the the new directory structure the platform has undergone
the following changes:

### Introduction of a teacher code: 
For each teacher (Lehrperson) an lp-code has been introduced.
The codes <code>lp01, lp02, ...</code> means teacher 1, teacher 2, ...
The class <code>lib/Teacher.php</code>

### Introduction of a semester code: 
In each semester an ict-module is planned for teaching. Therefore the supported 
semester-codes are looking as follows: (i.e. m152, m150 ...) 
The class <code>lib/Semester.php</code> is responsible for dealing these semester-codes.

### Directory structure
The supported directory which is not included in the 
```
data
    /lp01
        /m152
            /org
            /themen
            ...
        /m150
            /org
            /themen
            ...
    /lp02
        /m152
            /org
            /themen
            ...
        /m150
            /org
            /themen
            ...
           
        
```

### Disclaimer
[appi.bzzlab.ch](http://appi.bzzlab.ch) is an non-commercial platform which is only 
used for education purpose.

### Credits and used frameworks
The following authors, communities and open source platforms has directly contributed to that platform. Many thanks to these
brilliant coders and open source communities!
* [Parsedown](http://parsedown.org) as a very fast implementation to parse markdown code.
* [Bootstrap](https://getbootstrap.com/) 
* [highlight.js v9.6.0](http://git.io/hljslicense)
* [jQuery](http://jquery.com)
