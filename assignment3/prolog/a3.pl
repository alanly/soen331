% ------
% States
% ------

% Overall System States
state(boot).
state(monitoring).
state(safe_shutdown).
state(error_diagnosis).

% Boot States
state(dormant).
state(init).
state(idle).

% Monitoring States
state(monidle).
state(regulate_environment).
state(lockdown).

% Error Diagnosis States
state(error_rcv).
state(applicable_rescue).
state(reset_module_data).

% boot.init States
state(boot_hw).
state(senchk).
state(tchk).
state(psichk).
state(ready).

% monitoring.lockdown States
state(prep_vpurge).
state(alt_temp).
state(alt_psi).
state(risk_assess).
state(safe_status).

% -----------
% Transitions
% -----------

% boot.init Transitions
transition(init, null, boot_hw).
transition(boot_hw, hw_ok, senchk).
transition(senchk, senok, tchk).
transition(tchk, t_ok, psichk).
transition(psichk, psi_ok, ready).
