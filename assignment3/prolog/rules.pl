% ----------------------
% Extended Functionality
% ----------------------

is_loop(Event, Guard) :- transition(A,A,Event,Guard,_).
all_loops(Set) :- findall(S, transition(S,S,_,_,_), L), list_to_set(L, Set).
is_edge(Event, Guard) :- transition(_,_,Event,Guard,_).
size(Length) :- findall(E, transition(_,_,E,_,_), L), length(L, Length).
all_superstates(Set) :- findall(S, superstate(S,_), L), list_to_set(L, Set).
ancestor(Ancestor, Descendant) :- superstate(Ancestor, Descendant).
ancestor(Ancestor, Descendant) :- superstate(Ancestor, D), ancestor(D, Descendant).
inherited_transitions(State, List) :- findall(E, transition(_,State,E,_,_), List).
all_states(L) :- findall(S, state(S), L).
all_init_states(L) :- findall(S, initial_state(S,_), L).
get_starting_state(State) :- initial_state(State, null).
state_is_reflexive(State) :- transition(State,State,_,_,_).
get_guards(Ret) :- findall(G, transition(_,_,_,G,_), L), list_to_set(L, Ret).
get_events(Ret) :- findall(E, transition(_,_,E,_,_), L), list_to_set(L, Ret).
get_actions(Ret) :- findall(A, transition(_,_,_,_,A), L), list_to_set(L, Ret).









