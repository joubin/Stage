//
//  SocialButtons.m
//  Stage
//
//  Created by Joubin Jabbari on 12/27/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "SocialButtons.h"

@implementation SocialButtons{
    int numberOfButtons;
}



-  (id)initWithFrame:(CGRect)aRect
{
    self = [super initWithFrame:aRect];
    
    if (self)
    {
        self.frame = aRect;
        numberOfButtons = 0;
        [self setBackgroundColor:[UIColor whiteColor]];
    }
    
    return self;
}


-(UIButton *) addButtonWithTitle:(ButtonTypes)typeOfButton{
    numberOfButtons++;
    UIButton *button = [[UIButton alloc] initWithFrame:CGRectMake(0, 0, self.frame.size.width/numberOfButtons, self.frame.size.height)];
    [button setTitle:@"" forState:UIControlStateNormal];
    switch (typeOfButton) {
        case FACEBOOK:
            [button setImage:[UIImage imageNamed:@"facebook"] forState:UIControlStateNormal];
            break;
        case TWITTER:
            [button setImage:[UIImage imageNamed:@"twitter"] forState:UIControlStateNormal];
            break;
        case FAVORIT:
            [button setImage:[UIImage imageNamed:@"slayer-hand"] forState:UIControlStateNormal];
            break;
        default:
            break;
    }
    [button.imageView sizeToFit];
    [self addSubview:button];
    [self resizeButtonsForView];
    return button;
}


-(void)resizeButtonsForView{
    float buttonSize = self.frame.size.width/numberOfButtons;
    float delta = 0;
    for (UIButton *btn in self.subviews) {
        btn.frame = CGRectMake(delta, 0, buttonSize, self.frame.size.height);
        delta+=buttonSize;
    }
}
@end
