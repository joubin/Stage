//
//  SocialButtons.h
//  Stage
//
//  Created by Joubin Jabbari on 12/27/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface SocialButtons : UIView
-  (id)initWithFrame:(CGRect)aRect;
typedef enum {
    FACEBOOK, TWITTER, FAVORIT
}ButtonTypes;


-(UIButton *) addButtonWithTitle:(ButtonTypes)typeOfButton;
@end
