// This file is auto generated by TypescriptableLaravel.
const Routes: Record<App.Route.Name, App.Route.Entity> = {
  'login': {
    name: 'login',
    path: '/login',
    params: undefined,
    method: 'GET',
  },
  'login': {
    name: 'login',
    path: '/login',
    params: undefined,
    method: 'POST',
  },
  'logout': {
    name: 'logout',
    path: '/logout',
    params: undefined,
    method: 'POST',
  },
  'password.request': {
    name: 'password.request',
    path: '/forgot-password',
    params: undefined,
    method: 'GET',
  },
  'password.reset': {
    name: 'password.reset',
    path: '/reset-password/{token}',
    params: {
      token: 'string',
    },
    method: 'GET',
  },
  'password.email': {
    name: 'password.email',
    path: '/forgot-password',
    params: undefined,
    method: 'POST',
  },
  'password.update': {
    name: 'password.update',
    path: '/reset-password',
    params: undefined,
    method: 'POST',
  },
  'register': {
    name: 'register',
    path: '/register',
    params: undefined,
    method: 'GET',
  },
  'register': {
    name: 'register',
    path: '/register',
    params: undefined,
    method: 'POST',
  },
  'user-profile-information.update': {
    name: 'user-profile-information.update',
    path: '/user/profile-information',
    params: undefined,
    method: 'PUT',
  },
  'user-password.update': {
    name: 'user-password.update',
    path: '/user/password',
    params: undefined,
    method: 'PUT',
  },
  'user/confirm-password': {
    name: 'user/confirm-password',
    path: '/user/confirm-password',
    params: undefined,
    method: 'GET',
  },
  'password.confirmation': {
    name: 'password.confirmation',
    path: '/user/confirmed-password-status',
    params: undefined,
    method: 'GET',
  },
  'password.confirm': {
    name: 'password.confirm',
    path: '/user/confirm-password',
    params: undefined,
    method: 'POST',
  },
  'two-factor.login': {
    name: 'two-factor.login',
    path: '/two-factor-challenge',
    params: undefined,
    method: 'GET',
  },
  'two-factor-challenge': {
    name: 'two-factor-challenge',
    path: '/two-factor-challenge',
    params: undefined,
    method: 'POST',
  },
  'two-factor.enable': {
    name: 'two-factor.enable',
    path: '/user/two-factor-authentication',
    params: undefined,
    method: 'POST',
  },
  'two-factor.confirm': {
    name: 'two-factor.confirm',
    path: '/user/confirmed-two-factor-authentication',
    params: undefined,
    method: 'POST',
  },
  'two-factor.disable': {
    name: 'two-factor.disable',
    path: '/user/two-factor-authentication',
    params: undefined,
    method: 'DELETE',
  },
  'two-factor.qr-code': {
    name: 'two-factor.qr-code',
    path: '/user/two-factor-qr-code',
    params: undefined,
    method: 'GET',
  },
  'two-factor.secret-key': {
    name: 'two-factor.secret-key',
    path: '/user/two-factor-secret-key',
    params: undefined,
    method: 'GET',
  },
  'two-factor.recovery-codes': {
    name: 'two-factor.recovery-codes',
    path: '/user/two-factor-recovery-codes',
    params: undefined,
    method: 'GET',
  },
  'user/two-factor-recovery-codes': {
    name: 'user/two-factor-recovery-codes',
    path: '/user/two-factor-recovery-codes',
    params: undefined,
    method: 'POST',
  },
  'profile.show': {
    name: 'profile.show',
    path: '/user/profile',
    params: undefined,
    method: 'GET',
  },
  'other-browser-sessions.destroy': {
    name: 'other-browser-sessions.destroy',
    path: '/user/other-browser-sessions',
    params: undefined,
    method: 'DELETE',
  },
  'current-user-photo.destroy': {
    name: 'current-user-photo.destroy',
    path: '/user/profile-photo',
    params: undefined,
    method: 'DELETE',
  },
  'current-user.destroy': {
    name: 'current-user.destroy',
    path: '/user',
    params: undefined,
    method: 'DELETE',
  },
  'sanctum.csrf-cookie': {
    name: 'sanctum.csrf-cookie',
    path: '/sanctum/csrf-cookie',
    params: undefined,
    method: 'GET',
  },
  'api/user': {
    name: 'api/user',
    path: '/api/user',
    params: undefined,
    method: 'GET',
  },
  'api.submissions.create': {
    name: 'api.submissions.create',
    path: '/api/submissions',
    params: undefined,
    method: 'POST',
  },
  '/': {
    name: '/',
    path: '/',
    params: undefined,
    method: 'GET',
  },
  'dashboard': {
    name: 'dashboard',
    path: '/dashboard',
    params: undefined,
    method: 'GET',
  },
}

declare global {
  interface Window {
    Routes: Record<App.Route.Name, App.Route.Entity>
  }
}

if (typeof window !== undefined && typeof window.Routes !== undefined)
  window.Routes = Routes

export { Routes }
