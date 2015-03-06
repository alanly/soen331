## 2.1 Liskov's Principle

The _Liskov Substitution Principle_ (LSP) defines a category of subtyping/inheritance.
Specifically, it defines _behavioural subtyping_. Under object-oriented
nomenclature, this means that rather than simply considering the relationship
between classes (i.e. set of functions and attributes,) we also have to take
into consideration the possible behaviour of each class. The question becomes:
would subtyping one class against another potentially violate or hide any
behaviour that was defined (and hence promised) by the parent class?

Contractual specification (contract programming) is related to LSP in that
contracts allow us to validate the behaviour of all instances via defined
invariants, preconditions, and postconditions, ensuring they all meet a
behavioural specification. Where contractual specification differs from LSP is
in some of the finer points of the LSP, such as the distinction between
contravariant and covariant method parameters and return values. That's
typically left up to the type-checking system in the language.