% ------
% States
% ------

% Overall System States
state(boot).
state(monitoring).
state(safe_shutdown).
state(error_diagnosis).
state(quit).

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

% Initial States
initial_state(dormant, null).
initial_state(boot_hw, init).
initial_state(monidle, monitoring).
initial_state(error_rcv, error_diagnosis).
initial_state(prep_vpurge, lockdown).

% ------------
% Super-States
% ------------

% boot
superstate(boot, dormant).
superstate(boot, init).
superstate(boot, idle).

% init
superstate(init, boot_hw).
superstate(init, senchk).
superstate(init, tchk).
superstate(init, psichk).
superstate(init, ready).

% monitoring
superstate(monitoring, monidle).
superstate(monitoring, regulate_environment).
superstate(monitoring, lockdown).

% monitoring.lockdown
superstate(lockdown, prep_vpurge).
superstate(lockdown, alt_temp).
superstate(lockdown, alt_psi).
superstate(lockdown, risk_assess).
superstate(lockdown, safe_status).

% error_diagnosis
superstate(error_diagnosis, error_rcv).
superstate(error_diagnosis, applicable_rescue).
superstate(error_diagnosis, reset_module_data).

% -----------
% Transitions
% -----------

% boot Transitions (internal)
transition(dormant, init, start, null, null).
transition(init, idle, init_ok, null, null).

% boot.doormant - safe_shutdown Transition
transition(dormant, safe_shutdown, shutdown, null, null).
transition(safe_shutdown, dormant, sleep, null, null).

% boot.init Transitions
transition(boot_hw, senchk, hw_ok, null, null).
transition(senchk, tchk, senok, null, null).
transition(tchk, psichk, t_ok, null, null).
transition(psichk, ready, psi_ok, null, null).

% boot.init - error_diagnosis Transition
transition(init, error_diagnosis, init_crash, null, null).
transition(error_diagnosis, init, retry_init, null, 'retry++').

% boot.idle Transitions
transition(idle, monitoring, begin_monitoring, null, null).

% boot.idle - error_diagnosis Transition
transition(idle, error_diagnosis, idle_crash, null, null).
transition(error_diagnosis, idle, idle_rescue, null, null).

% monitoring - error_diagnosis Transitions
transition(monitoring, error_diagnosis, monitor_crash, 'inlockdown == false', null).
transition(error_diagnosis, monitoring, moni_rescue, null, null).

% monitoring Transitions (internal)
transition(monidle, monidle, 'check for contagion', null, null).
transition(monidle, regulate_environment, no_contagion, null, null).
transition(regulate_environment, monidle, '100ms elapsed', null, null).
transition(monidle, lockdown, contagion_alert, null, 'inlockdown = true').
transition(lockdown, monidle, purge_succ, null, 'inlockdown = false').

% monitoring.lockdown Transitions (internal)
transition(prep_vpurge, alt_temp, initiate_purge, null, lock_doors).
transition(prep_vpurge, alt_psi, initiate_purge, null, lock_doors).
transition(alt_temp, risk_assess, tcyc_comp, null, null).
transition(alt_psi, risk_assess, psicyc_comp, null, null).
transition(risk_assess, safe_status, null, 'risk < 1%', unlock_doors).
transition(risk_assess, prep_vpurge, null, 'risk >= 1%', null).
transition(safe_status, quit, null, null, null).

% error_diagnosis Transitions
transition(error_diagnosis, safe_shutdown, 'retry >= 3', null, null).

% error_diagnosis Transitions (internal)
transition(error_rcv, applicable_rescue, null, 'err_protocol_def == true', null).
transition(error_rcv, reset_module_data, null, 'err_protocol_def == false', null).
transition(applicable_rescue, quit, apply_protocol_rescues, null, null).
transition(reset_module_data, quit, reset_to_stable, null, null).